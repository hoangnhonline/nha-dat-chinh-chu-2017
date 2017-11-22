<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.member.index');
    }

    public function updateInfo(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|max:200',
            'address' => 'max:500',
            'phone' => 'regex:[^([\+1-9]{3})?([0])?([1,9,8])([0-9]{8,9})$]',
            'new_password' => 'between:6,20|regex:[((?=.*\d).{6,20})]'
        ], [
            'full_name.required' => 'Bạn chưa nhập họ tên.',
            'full_name.max' => 'Họ tên không được dài hơn :max ký tự.',
            'address.max' => 'Địa chỉ không được dài hơn :max ký tự.',
            'phone.regex' => 'Số điện th mac oại không hợp lệ.',
            'new_password.between' => 'Mật khẩu mới phải nằm trong khoảng từ :min đến :max ký tự.',
            'new_password.regex' => 'Mật khẩu mới không hợp lệ.'
        ]);

        $userInfo = auth('web')->user();
        $params = [
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
        ];

        if (!empty($request->new_password)) {
            $params['password'] = bcrypt($request->new_password);
        }

        $userInfo->update($params);

        return redirect(route('member.detail'));
    }

    public function registerLand(Request $request)
    {
        if ($request->isMethod('get')) {
            $modelCity = new City();
            $arrListCity = $modelCity->getByAttributes([
                'name' => ['<>', '']
            ], 'display_order', 'desc');

            return view('frontend.member.register_land', compact('arrListCity'));
        } else {

        }
    }
}
