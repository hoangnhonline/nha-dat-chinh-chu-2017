<?php
namespace App\Http\Controllers\Backend\System;

use App\Models\Groups;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public $modelGroups;
    public $modelUsers;

    public function __construct()
    {
        $this->modelGroups = new Groups();
        $this->modelUsers = new Users();
    }

    public function index(Request $request)
    {
        $group_id = $request->group_id ? $request->group_id : null;

        $params = [
            'status' => ['>', 0],
            'type' => 'member'
        ];
        if (!empty($group_id)) {
            $params['group_id'] = $group_id;
        }

        $arrListUser = $this->modelUsers->getByAttributes($params);

        $arrListGroup = $this->modelGroups->getByAttributes([
            'status' => 1,
            'type' => 'member'
        ], 'type', 'asc');

        return view('backend.system.member.index', compact('group_id', 'arrListUser', 'arrListGroup'));
    }

    public function create(Request $request)
    {
        $arrListGroup = $this->modelGroups->getByAttributes([
            'status' => 1,
            'type' => 'admin'
        ], 'type', 'asc');

        return view('backend.system.member.create', compact('arrListGroup'));
    }

    public function store(Request $request)
    {
        Session::flash('message', 'Tạo mới thành công.');
    }

    public function edit(Request $request, $id)
    {
        $userInfo = $this->modelUsers->find($id);

        if (!$userInfo) {
            abort(404);
        }

        $arrListGroup = $this->modelGroups->getByAttributes([
            'status' => 1,
            'type' => 'admin'
        ], 'type', 'asc');

        return view('backend.system.member.edit', compact('userInfo', 'arrListGroup'));
    }

    public function update(Request $request, $id)
    {
        $userInfo = $this->modelUsers->find($id);

        if (!$userInfo) {
            abort(404);
        }

        Session::flash('message', 'Cập nhật thành công.');

        return redirect(route('system.member.edit', $userInfo->id));
    }

    public function destroy(Request $request, $id)
    {
        $userInfo = $this->modelUsers->find($id);

        if (!$userInfo) {
            abort(404);
        }

        $userInfo->delete();

        Session::flash('message', 'Xóa thành công.');

        return redirect(route('system.member.index', ['group_id' => $userInfo->group_id]));
    }
}
