<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

/**
 * Class for login and logout
 */
class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->intended($this->redirectPath());
        }

        return redirect('login')
            ->withInput($request->only('email', 'remember'))
            ->withErrors([
                'password' => 'Erro no Login/password',
            ]);
    }

    public function getLogin()
    {
        return view('login');
    }

    public function getLogout()
    {
        request()->session()->flush();
        Auth::logout();
        return redirect('/login');
    }
}
