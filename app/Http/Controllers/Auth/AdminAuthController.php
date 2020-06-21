<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminAuthController extends Controller
{
    //
    use AuthenticatesUsers;

    protected $guardName = 'admin';
    protected $maxAttempts = 4;
    protected $decayMinutes = 2;

    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout','showResetPasswordView','resetPassword']);
    }

    public function showLoginView(){
        return view('cms.admin.auth.login');
    }

    public function login(Request $request){
        //dd(77);
        $request->validate([
            'email'=>'required|email|string',
            'password'=>'required|string|min:3|max:10',
            'remember_me'=>'string|in:on'
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        $rememberMe = $request->remember_me == 'on' ? true : false;

        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials, $rememberMe)){
            $user = Auth::guard('admin')->user();
            if ($user->status == "Active"){
                $this->clearLoginAttempts($request);
                return redirect()->route('cms.admin.dashboard');
            }else{
                Auth::guard('admin')->logout();
                return redirect()->guest(route('cms.admin.blocked'));
            }
        }else{
            $this->incrementLoginAttempts($request);
            return redirect()->back()->withInput();
        }
    }

    public function showResetPasswordView(){
        return view('cms.admin.settings.reset_password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string|password:admin',
            'new_password' => 'required|string',
            'new_password_confirmation' => 'required|string|same:new_password'
        ],['current_password.password'=>'Your current password is not correct']);

        $user = Auth::user();
        $user->password = Hash::make($request->get('new_password'));
        $isSaved = $user->save();
        if ($isSaved) {
            return response()->json(['icon' => 'success', 'title' => 'Password changed successfully'], 200);
        } else {
            return response()->json(['icon' => 'success', 'title' => 'Password change failed!'], 400);
        }
    }

    public function showForgetPassword()
    {
        return view('cms.admin.auth.forgot-password');
    }

    public function requestNewPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:admins,email|email',
        ], ['email.exists' => 'This is email is not registered before']);

        $newPassword = Str::random(8);

        $student = Admin::where('email', $request->get('email'))->first();
        $student->password = Hash::make($newPassword);
        $isSaved = $student->save();
        if ($isSaved) {
//            $this->sendResetPasswordEmail($student, $newPassword);
            return redirect()->route('cms.student.login_view');
        } else {

        }
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('cms.admin.login_view'));
    }
}
