<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    // protected $redirectTo = '/admin';
    public function redirectTo()
    {
        // User role
        $user = Auth::user();
        $role = $user->role;
        $isDefaultPassword = Hash::check('12345678', $user->password);

        // Check user role
        switch ($role) {
            case 'ADMIN':
                return '/admin/';
            case 'UMAT':
                if ($isDefaultPassword) {
                    session()->flash('error', 'Password anda menggunakan password default. Silahkan ubah password anda.');
                    return '/umat/akun';
                } else {
                    return '/umat/';
                }
            case 'PENDETA':
                if ($isDefaultPassword) {
                    session()->flash('error', 'Password anda menggunakan password default. Silahkan ubah password anda.');
                    return '/pendeta/akun';
                } else {
                    return '/pendeta/';
                }
            default:
                return '/login';
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
