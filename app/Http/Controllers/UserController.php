<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // Show register page
    public function create()
    {

        return view('users.register');
        
    }

    // Register user
    public function register(Request $request)
    {

        $inputFields = $request->validate([
            'name'      => 'required|min:3',
            'email'     => ['required', 'email'],
            'password'  => ['required', 'confirmed']
        ]);

        $inputFields['password'] = bcrypt($inputFields['password']);
        $inputFields['role']     = 'Customer';

        $user = User::create($inputFields);

        if ($user)
        {

            auth()->login($user);

            RoleUser::create([
                'role_id'   => 2,
                'user_id'   => auth()->user()->id
            ]);

        }

        return redirect('/');
        
    }

    // Show customer login page
    public function login()
    {

        return view('users.login');

    }

    // Log user in (authenticate)
    public function authenticate(Request $request)
    {

        $inputFields = $request->validate([
            'email'     => ['required', 'email'],
            'password'  => 'required'
        ]);

        if (auth()->attempt($inputFields))
        {

            $request->session()->regenerate();

            return redirect('/');

        }

        // Insert security settings below
        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        
    }
    
    // Log user out
    public function logout(Request $request)
    {

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }

}
