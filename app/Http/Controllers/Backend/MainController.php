<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Auth\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Events\Backend\User\UserLoggedIn;
use App\Events\Backend\User\UserLoggedOut;

class MainController extends Controller{
    
    use AuthenticatesUsers;

    public function index(){
        return view('backend.main');
    }

    public function redirectPath(){
        return route('admin.main');
    }

    public function showLoginForm(){
        return view('backend.login');
    }

    protected function authenticated(Request $request, $user){

        event(new UserLoggedIn($user));

        return redirect()->intended($this->redirectPath());
    }

    protected function validateLogin(Request $request){
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
        ],[],[$this->username() =>'用户名','password' => '密码']);
    }

    public function username(){
        return 'name';
    }

    public function logout(Request $request){
        app()->make(Auth::class)->flushTempSession();
        event(new UserLoggedOut($this->guard()->user()));
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/admin');
    }
}
