<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\Groups;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    use AuthenticatesUsers;
    use ThrottlesLogins;
    
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo;
    
    /**
     * Where to redirect users after logout.
     *
     * @var string
     */
    protected $redirectAfterLogout;
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web', ['except' => ['register', 'postRegister', 'logout']]);
        
        $this->redirectTo = route('member.detail');
        $this->redirectAfterLogout = route('home');
    }
    
    public function getLogin()
    {
        return view('frontend.auth.login');
    }
    
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Bạn chưa nhập tên đăng nhập.',
            'password.required' => 'Bạn chưa nhập mật khẩu.'
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password, 'type' => 'member', 'status' => 1], $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }
        
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if (!$lockedOut) {
            $this->incrementLoginAttempts($request);
        }
        
        return redirect()->back()->withInput()->withErrors(['username' => ['Tên đăng nhập hoặc mật khẩu không đúng.']]);
    }

    public function logout(Request $request)
    {
        auth('web')->logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : route('home'));
    }

    public function getRegister()
    {
        $modelGroups = new Groups();
        $arrListGroup = $modelGroups->getByAttributes([
            'type' => 'member',
            'status' => 1
        ], 'display_order', 'asc');

        return view('frontend.auth.register', compact('arrListGroup'));
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|max:200',
            'username' => 'required|regex:[^(?=.{6,20}$)[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$]|unique:users,username,null,id,type,member',
            'password' => 'required|regex:[((?=.*\d).{6,20})]',
            'password_confirmed' => 'same:password',
            'group_id' => 'required',
            'email' => 'email|max:200|unique:users,email,null,id,type,member',
            'phone' => 'regex:[^([\+1-9]{3})?([0])?([1,9,8])([0-9]{8,9})$]',
            'agree_term' => 'required'
        ], [
            'full_name.required' => 'Bạn chưa nhập tên đầy đủ.',
            'full_name.max' => 'Tên đầy đủ không được dài hơn :max ký tự.',
            'username.required' => 'Bạn chưa nhập tên đăng nhập.',
            'username.regex' => 'Tên đăng nhập không hợp lệ.',
            'username.unique' => 'Tên đăng nhập này đã tồn tại, vui lòng chọn tên đăng nhập khác.',
            'password.required' => 'Bạn chưa nhập mật khẩu.',
            'password.regex' => 'Mật khẩu không hợp lệ.',
            'password_confirmed.same' => 'Xác nhận mật khẩu không khớp với mật khẩu.',
            'group_id.required' => 'Vui lòng chọn loại thành viên.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email không được dài hơn :max ký tự.',
            'email.unique' => 'Email này đã tồn tại, vui lòng chọn email khác.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'agree_term.required' => 'Vui lòng chọn đồng ý với các điều khoản của dịch vụ.',
        ]);

        //get model
        $modelUsers = new Users();

        $modelUsers->create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'group_id' => $request->group_id,
            'phone' => $request->phone,
            'type' => 'member',
            'status' => 1
        ]);

        Session::flash('message', 'Đăng ký thành công.');

        return redirect(route('auth.login'));
    }
}
