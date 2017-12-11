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

        return view('backend.group.member.index', compact('group_id', 'arrListUser', 'arrListGroup'));
    }

    public function create(Request $request)
    {
        $arrListGroup = $this->modelGroups->getByAttributes([
            'status' => 1,
            'type' => 'member'
        ], 'type', 'asc');

        $group_id = $request->group_id;

        return view('backend.group.member.create', compact('arrListGroup', 'group_id'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:200|unique:users,email,null,id,type,member',
            'username' => 'required|regex:[^(?=.{6,20}$)[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$]|unique:users,username,null,id,type,member',
            'full_name' => 'required|max:200',
            'phone' => 'regex:[^([\+1-9]{3})?([0])?([1,9,8])([0-9]{8,9})$]',
            'status' => 'required|in:1,2',
            'group_id' => 'required|exists:groups,id,type,member',
            'password' => 'required|regex:[((?=.*\d).{6,20})]',
            're_password' => 'same:password',
        ], [
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email không được dài hơn :max ký tự.',
            'email.unique' => 'Email này đã tồn tại, vui lòng chọn email khác.',
            'username.required' => 'Bạn chưa nhập tên truy cập.',
            'username.regex' => 'Tên truy cập không hợp lệ.',
            'username.unique' => 'Tên truy cập này đã tồn tại, vui lòng chọn tên truy cập khác.',
            'full_name.required' => 'Bạn chưa nhập họ tên.',
            'full_name.max' => 'Họ tên không được dài hơn :max ký tự.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
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
            'username' => $request->username,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'group_id' => $request->group_id,
            'status' => $request->status,
            'password' => bcrypt($request->password),
            'type' => 'member',
            'created_user' => auth('backend')->user()->id,
            'updated_user' => auth('backend')->user()->id
        ]);

        Session::flash('message', 'Tạo mới thành công.');

        return redirect(route('group.member.edit', $userInfo->id));
    }

    public function edit(Request $request, $id)
    {
        $userInfo = $this->modelUsers->find($id);

        if (!$userInfo) {
            abort(404);
        }

        $arrListGroup = $this->modelGroups->getByAttributes([
            'status' => 1,
            'type' => 'member'
        ], 'type', 'asc');

        return view('backend.group.member.edit', compact('userInfo', 'arrListGroup'));
    }

    public function update(Request $request, $id)
    {
        $userInfo = $this->modelUsers->find($id);

        if (!$userInfo) {
            abort(404);
        }

        $this->validate($request, [
            'email' => 'email|max:200|unique:users,email,' . $userInfo->id . ',id,type,member',
            'username' => 'required|regex:[^(?=.{6,20}$)[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$]|unique:users,username,' . $userInfo->id . ',id,type,member',
            'full_name' => 'required|max:200',
            'phone' => 'regex:[^([\+1-9]{3})?([0])?([1,9,8])([0-9]{8,9})$]',
            'status' => 'required|in:1,2',
            'group_id' => 'required|exists:groups,id,type,member',
            'password' => 'regex:[((?=.*\d).{6,20})]',
            're_password' => 'same:password',
        ], [
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email không được dài hơn :max ký tự.',
            'email.unique' => 'Email này đã tồn tại, vui lòng chọn email khác.',
            'username.required' => 'Bạn chưa nhập tên truy cập.',
            'username.regex' => 'Tên truy cập không hợp lệ.',
            'username.unique' => 'Tên truy cập này đã tồn tại, vui lòng chọn tên truy cập khác.',
            'full_name.required' => 'Bạn chưa nhập họ tên.',
            'full_name.max' => 'Họ tên không được dài hơn :max ký tự.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'status.max' => 'Bạn chưa chọn trạng thái.',
            'status.in' => 'Trạng thái không đúng.',
            'group_id.required' => 'Bạn chưa chọn nhóm.',
            'group_id.exists' => 'Nhóm không tồn tại.',
            'password.regex' => 'Mật khẩu không hợp lệ.',
            're_password.same' => 'Nhập lại mật khẩu không đúng.',
        ]);

        $params = [
            'email' => $request->email,
            'username' => $request->username,
            'full_name' => $request->full_name,
            'phone' => $request->phone,
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

        return redirect(route('group.member.edit', $userInfo->id));
    }

    public function destroy(Request $request, $id)
    {
        $userInfo = $this->modelUsers->find($id);

        if (!$userInfo) {
            abort(404);
        }

        $userInfo->delete();

        Session::flash('message', 'Xóa thành công.');

        return redirect(route('group.member.index', ['group_id' => $userInfo->group_id]));
    }
}
