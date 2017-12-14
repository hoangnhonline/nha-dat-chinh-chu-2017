<?php
namespace App\Http\Controllers\Frontend\Member;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Product;
use App\Models\ProductImg;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.member.index');
    }

    public function updateInfo(Request $request)
    {
        $userInfo = auth('web')->user();

        $this->validate($request, [
            'full_name' => 'required|max:200',
            'username' => 'required|regex:[^(?=.{6,20}$)[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$]|unique:users,username,' . $userInfo->id . ',id,type,member',
            'email' => 'email|max:200|unique:users,email,' . $userInfo->id . ',id,type,member',
            'address' => 'max:500',
            'phone' => 'regex:[^([\+1-9]{3})?([0])?([1,9,8])([0-9]{8,9})$]',
            'new_password' => 'regex:[((?=.*\d).{6,20})]'
        ], [
            'full_name.required' => 'Bạn chưa nhập họ tên.',
            'full_name.max' => 'Họ tên không được dài hơn :max ký tự.',
            'username.required' => 'Bạn chưa nhập tên truy cập.',
            'username.regex' => 'Tên truy cập không hợp lệ.',
            'username.unique' => 'Tên truy cập này đã tồn tại, vui lòng chọn tên truy cập khác.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email không được dài hơn :max ký tự.',
            'email.unique' => 'Email này đã tồn tại, vui lòng chọn email khác.',
            'address.max' => 'Địa chỉ không được dài hơn :max ký tự.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'new_password.regex' => 'Mật khẩu mới không hợp lệ.'
        ]);

        $params = [
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address ? $request->address : null,
            'phone' => $request->phone
        ];

        if ($request->avatar) {
            $params['avatar'] = $request->avatar;
        } else {
            $params['avatar'] = '';
        }

        if (!empty($request->new_password)) {
            $params['password'] = bcrypt($request->new_password);
        }

        $userInfo->update($params);

        Session::flash('message', 'Cập nhật thành công.');

        return redirect(route('member.detail'));
    }
}
