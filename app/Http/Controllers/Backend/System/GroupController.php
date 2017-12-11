<?php

namespace App\Http\Controllers\Backend\System;

use App\Models\Groups;
use App\Models\Modules;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    public $modelGroups;
    public $modelModules;

    public function __construct()
    {
        if (auth('backend')->user()->group_id != config('nhadat.admin_group_id')) {
            abort(404);
        }

        $this->modelGroups = new Groups();
        $this->modelModules = new Modules();
    }

    public function index(Request $request)
    {
        $arrListGroup = $this->modelGroups->getByAttributes([
            'status' => ['>', 0]
        ], 'type', 'asc');

        return view('backend.group.index', compact('arrListGroup'));
    }

    public function edit(Request $request, $id)
    {
        $groupInfo = $this->modelGroups->find($id);

        if (!$groupInfo) {
            abort(404);
        }

        $arrListModule = $this->modelModules->getByAttributes([]);
        $arrPermission = json_decode($groupInfo->permission, true);
        $arrRole = [
            0 => ['view', 'Xem'],
            1 => ['add', 'Thêm'],
            2 => ['edit', 'Sửa'],
            3 => ['delete', 'Xóa'],
            4 => ['active', 'Đã duyệt'],
            5 => ['inactive', 'Chưa duyệt']
        ];

        return view('backend.group.edit', compact('groupInfo', 'arrListModule', 'arrPermission', 'arrRole'));
    }

    public function update(Request $request, $id)
    {
        $groupInfo = $this->modelGroups->find($id);

        if (!$groupInfo) {
            abort(404);
        }

        if ($groupInfo->type == 'admin') {
            $rules = [
                'name_vi' => 'required|max:100',
                'description_vi' => 'max:5000'
            ];
            $messages = [
                'name_vi.required' => 'Bạn chưa nhập tên nhóm.',
                'name_vi.max' => 'Tên nhóm không được dài quá :max ký tự.',
                'description_vi.max' => 'Giới thiệu không được dài quá :max ký tự.',
            ];
        } else {
            $rules = [
                'name_vi' => 'required|max:100',
                'name_en' => 'required|max:100',
                'description_vi' => 'required|max:5000',
                'description_en' => 'required|max:5000',
            ];
            $messages = [
                'name_vi.required' => 'Bạn chưa nhập tên nhóm tiếng Việt.',
                'name_vi.max' => 'Tên nhóm tiếng Việt không được dài quá :max ký tự.',
                'name_en.required' => 'Bạn chưa nhập tên nhóm tiếng Anh.',
                'name_en.max' => 'Tên nhóm tiếng Anh không được dài quá :max ký tự.',
                'description_vi.required' => 'Bạn chưa nhập giới thiệu tiếng Việt.',
                'description_vi.max' => 'Giới thiệu tiếng Việt không được dài quá :max ký tự.',
                'description_en.required' => 'Bạn chưa nhập giới thiệu tiếng Anh.',
                'description_en.max' => 'Giới thiệu tiếng Anh không được dài quá :max ký tự.'
            ];
        }
        $this->validate($request, $rules, $messages);

        $arrPermission = reset_permission(json_decode($groupInfo->permission, true));
        $arrRole = [
            'view' => 0,
            'add' => 1,
            'edit' => 2,
            'delete' => 3,
            'active' => 0,
            'inactive' => 1,
        ];

        foreach ($arrPermission as $module => &$permission) {
            if (isset($request->permission[$module])) {
                foreach ($request->permission[$module] as $role => $value) {
                    $permission[$arrRole[$role]] = $value;
                }
            }
        }

        if ($groupInfo->type == 'admin') {
            $groupInfo->update([
                'name_vi' => $request->name_vi,
                'name_en' => $request->name_vi,
                'description_vi' => $request->description_vi,
                'description_en' => $request->description_vi,
                'permission' => json_encode($arrPermission),
                'updated_user' => auth('backend')->user()->id
            ]);
        } else {
            $groupInfo->update([
                'name_vi' => $request->name_vi,
                'name_en' => $request->name_en,
                'description_vi' => $request->description_vi,
                'description_en' => $request->description_en,
                'permission' => json_encode($arrPermission),
                'updated_user' => auth('backend')->user()->id
            ]);
        }

        Session::flash('message', 'Cập nhật thành công.');

        return redirect(route('group.edit', $groupInfo->id));
    }
}
