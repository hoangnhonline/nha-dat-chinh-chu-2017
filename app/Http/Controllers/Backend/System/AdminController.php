<?php

namespace App\Http\Controllers\Backend\System;

use App\Models\Groups;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public $modelGroups;
    public $modelUsers;

    public function __construct()
    {
        if (auth('backend')->user()->group_id != config('nhadat.admin_group_id')) {
            abort(404);
        }

        $this->modelGroups = new Groups();
        $this->modelUsers = new Users();
    }

    public function index(Request $request)
    {
        $group_id = $request->group_id ? $request->group_id : null;

        $params = [
            'status' => ['>', 0],
            'type' => 'admin'
        ];
        if (!empty($group_id)) {
            $params['group_id'] = $group_id;
        }

        $arrListUser = $this->modelUsers->getByAttributes($params);

        $arrListGroup = $this->modelGroups->getByAttributes([
            'status' => 1,
            'type' => 'admin'
        ], 'type', 'asc');

        return view('backend.group.admin.index', compact('group_id', 'arrListUser', 'arrListGroup'));
    }

    public function create(Request $request)
    {
        $arrListGroup = $this->modelGroups->getByAttributes([
            'status' => 1,
            'type' => 'admin'
        ], 'type', 'asc');

        $group_id = $request->group_id;

        return view('backend.group.admin.create', compact('arrListGroup', 'group_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:200|unique:users,email,null,id,type,admin',
            'full_name' => 'required|max:200',
            'status' => 'required|in:1,2',
            'group_id' => 'required|exists:groups,id,type,admin',
            'password' => 'required|regex:[((?=.*\d).{6,20})]',
            're_password' => 'same:password',
        ], [
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email không được dài hơn :max ký tự.',
            'email.unique' => 'Email này đã tồn tại, vui lòng chọn email khác.',
            'full_name.required' => 'Bạn chưa nhập họ tên.',
            'full_name.max' => 'Họ tên không được dài hơn :max ký tự.',
            'status.max' => 'Bạn chưa chọn trạng thái.',
            'status.in' => 'Trạng thái không đúng.',
            'group_id.required' => 'Bạn chưa chọn nhóm.',
            'group_id.exists' => 'Nhóm không tồn tại.',
            'password.required' => 'Bạn chưa nhập mật khẩu.',
            'password.regex' => 'Mật khẩu không hợp lệ.',
            're_password.same' => 'Nhập lại mật khẩu không đúng.',
        ]);

        $userInfo = $this->modelUsers->create([
            'email' => $request->email,
            'full_name' => $request->full_name,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'password' => bcrypt($request->password),
            'type' => 'admin',
            'created_user' => auth('backend')->user()->id,
            'updated_user' => auth('backend')->user()->id
        ]);

        Session::flash('message', 'Tạo mới thành công.');

        return redirect(route('group.admin.edit', $userInfo->id));
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

        return view('backend.group.admin.edit', compact('userInfo', 'arrListGroup'));
    }

    public function update(Request $request, $id)
    {
        $userInfo = $this->modelUsers->find($id);

        if (!$userInfo) {
            abort(404);
        }

        $this->validate($request, [
            'full_name' => 'required|max:200',
            'status' => 'required|in:1,2',
            'group_id' => 'required|exists:groups,id,type,admin',
            'password' => 'regex:[((?=.*\d).{6,20})]',
            're_password' => 'same:password',
        ], [
            'full_name.required' => 'Bạn chưa nhập họ tên.',
            'full_name.max' => 'Họ tên không được dài hơn :max ký tự.',
            'status.max' => 'Bạn chưa chọn trạng thái.',
            'status.in' => 'Trạng thái không đúng.',
            'group_id.required' => 'Bạn chưa chọn nhóm.',
            'group_id.exists' => 'Nhóm không tồn tại.',
            'password.regex' => 'Mật khẩu không hợp lệ.',
            're_password.same' => 'Nhập lại mật khẩu không đúng.',
        ]);

        $params = [
            'full_name' => $request->full_name,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'updated_user' => auth('backend')->user()->id
        ];

        //check if password is change
        if (!empty($request->password)) {
            $params['password'] = bcrypt($request->password);
        }
        $userInfo->update($params);

        Session::flash('message', 'Cập nhật thành công.');

        return redirect(route('group.admin.edit', $userInfo->id));
    }

    public function destroy(Request $request, $id)
    {
        $userInfo = $this->modelUsers->find($id);

        if (!$userInfo) {
            abort(404);
        }

        $userInfo->delete();

        Session::flash('message', 'Xóa thành công.');

        return redirect(route('group.admin.index', ['group_id' => $userInfo->group_id]));
    }
}
