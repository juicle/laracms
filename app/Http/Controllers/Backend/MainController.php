<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Events\Backend\User\UserLoggedIn;

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
        if (! $user->isConfirmed()) {
            access()->logout();
            throw new GeneralException(trans('exceptions.frontend.auth.confirmation.resend', ['user_id' => $user->id]));
        } elseif (! $user->isActive()) {
            access()->logout();
            throw new GeneralException(trans('exceptions.frontend.auth.deactivated'));
        }

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



    public function logout(){
        
    }
}
