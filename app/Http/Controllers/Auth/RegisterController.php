<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Validator;

/**
 * Class for Register operations
 */
class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $request){
        $errors = [];

        $this->validate($request, [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password'  => 'required|min:6|confirmed',
        ]);

        $input = $request->all();
        $user = $this->create($input);

        if (is_null($user)) {
            return back()->withInput($input)->withErrors("Error creating user")
                ->with('flash-type', 'error')
                ->with('flash-message', "Error creating user");
        }

        return redirect('/login')
            ->with('flash-type', 'success')
            ->with('flash-message', 'User created');
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
