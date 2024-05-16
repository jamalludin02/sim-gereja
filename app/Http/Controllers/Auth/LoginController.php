<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function Login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|numeric',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($request->only(['email','password']))){
            return redirect()->intended('/');
        }else{
            session()->flash('error', 'nik dan password salah.');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->flush();
        Session::forget('key');
        return redirect('/');
    }
}
