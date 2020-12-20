<?php

namespace App\Http\Controllers\Auth;

use App\Activity;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            Activity::create([
                'user_id' => Auth::user()->id,
                'nama' => 'Login',
                'subjek' => 'Login akun admin',
            ]);
            return redirect()->route('admin.page');
        }

        return redirect()->route('super.page');
    }

    public function logout()
    {
        Activity::create([
            'user_id' => Auth::user()->id,
            'nama' => 'Logout',
            'subjek' => 'Logout akun admin',
        ]);
        Auth::logout();
        return redirect('login');
    }
}
