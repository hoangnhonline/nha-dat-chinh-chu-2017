<?php

namespace App\Http\Controllers\Frontend\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    use AuthenticatesUsers;
    
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
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Bạn chưa nhập mật khẩu.'
        ]);
        
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            
            return $this->sendLockoutResponse($request);
        }
        
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->has('remember'))) {
            // Authentication passed...
            return $this->sendLoginResponse($request);
        }
        
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if (!$lockedOut) {
            $this->incrementLoginAttempts($request);
        }
        
        return redirect()->back()->withInput()->withErrors(['email' => ['Email hoặc mật khẩu không đúng.']]);
    }

    public function logout(Request $request)
    {
        auth('web')->logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : route('home'));
    }

    public function getRegister()
    {
        return view('frontend.auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|max:200',
            'email' => 'required|email|max:200|unique:users,email,null,id',
            'password' => 'required|between:6,20|regex:[^[a-z0-9\-]+$]',
            're_password' => 'same:password',
            'phone' => 'max:20',
            'agree_term' => 'required'
        ], [
            'full_name.required' => 'Bạn chưa nhập họ và tên.',
            'full_name.max' => 'Họ và tên không được dài hơn :max ký tự.',
            'email.required' => 'Bạn chưa nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email không được dài hơn :max ký tự.',
            'email.unique' => 'Email này đã tồn tại, vui lòng chọn email khác.',
            'password.required' => 'Bạn chưa nhập mật khẩu.',
            'password.between' => 'Mật khẩu phải nằm trong khoảng từ :min đến :max ký tự.',
            'password.regex' => 'Mật khẩu không hợp lệ.',
            're_password.same' => 'Nhập lại mật khẩu không khớp với mật khẩu.',
            'phone.max' => 'Di động không được dài hơn :max ký tự.',
            'agree_term.required' => 'Vui lòng chọn đồng ý với các điều khoản của dịch vụ.',
        ]);

        //get model
        $modelUsers = new Users();

        $modelUsers->create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'group_id' => $request->group_id,
            'phone' => $request->phone,
            'status' => 1
        ]);

        return redirect(route('auth.login'));
    }
}
