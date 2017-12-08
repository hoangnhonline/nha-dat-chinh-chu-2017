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
        $this->modelGroups = new Groups();
        $this->modelModules = new Modules();
    }

    public function index(Request $request)
    {
        $arrListGroup = $this->modelGroups->getByAttributes([
            'status' => ['>', 0]
        ], 'type', 'asc');

        return view('backend.system.group.index', compact('arrListGroup'));
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

        return view('backend.system.group.edit', compact('groupInfo', 'arrListModule', 'arrPermission', 'arrRole'));
    }

    public function update(Request $request, $id)
    {
        $groupInfo = $this->modelGroups->find($id);

        if (!$groupInfo) {
            abort(404);
        }

        $this->validate($request, [
            'name_vi' => 'required|max:100',
            'description_vi' => 'max:5000'
        ], [
            'name_vi.required' => 'Bạn chưa nhập tên nhóm.',
            'name_vi.max' => 'Tên nhóm không được dài quá :max ký tự.',
            'description_vi.max' => 'Giới thiệu không được dài quá :max ký tự.'
        ]);

        $arrPermission= reset_permission(json_decode($groupInfo->permission, true));
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

        $groupInfo->update([
            'name_vi' => $request->name_vi,
            'name_en' => $request->name_vi,
            'description_vi' => $request->description_vi,
            'description_en' => $request->description_vi,
            'permission' => json_encode($arrPermission),
            'updated_user' => auth('admin')->user()->id
        ]);

        Session::flash('message', 'Cập nhật thành công.');

        return redirect(route('system.group.edit', $groupInfo->id));
    }
}
