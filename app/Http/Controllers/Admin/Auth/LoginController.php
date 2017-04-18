<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function getLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLogin(Request $request)
    {
        /**
         * "_token" => "vr2Yypah7B5Lu91Z3EsobrMAHOR3x8bMCCgFRYqq"
        "username" => "18916550105"
        "password" => "admin"
        "remember_token" => "true"
         */
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->get('username');
        $password = $request->get('password');
        $remeber = $request->get('remember_token') == 'true' ? true : false;

        if (Auth::attempt(['email' => $username, 'password' => $password], $remeber)) {
            // 登陆成功
            return redirect('dashboard');
        }

        return back()->withErrors('用户名或密码错误');

    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return redirect('dashboard/login');
    }
}
