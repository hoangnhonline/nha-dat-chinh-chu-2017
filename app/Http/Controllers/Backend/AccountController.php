<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function changePass()
    {
        return view('backend.account.change-pass');
    }

    public function storeNewPass(Request $request)
    {
        $detail = auth('backend')->user();
        $old_pass = $request->old_pass;
        $new_pass = $request->new_pass;
        $new_pass_re = $request->new_pass_re;

        if ($old_pass == '' || $new_pass == "" || $new_pass_re == "") {
            return redirect()->back()->withErrors(["Chưa nhập đủ thông tin bắt buộc!"])->withInput();
        }

        if (!password_verify($old_pass, $detail->password)) {
            return redirect()->back()->withErrors(["Nhập mật khẩu hiện tại không đúng!"])->withInput();
        }

        if ($new_pass != $new_pass_re) {
            return redirect()->back()->withErrors("Xác nhận mật khẩu mới không đúng!")->withInput();
        }

        $detail->update([
            'password' => bcrypt($new_pass)
        ]);

        Session::flash('message', 'Đổi mật khẩu thành công');

        return redirect()->route('account.change-pass');
    }
}
