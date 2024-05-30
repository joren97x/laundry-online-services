<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('user.auth.register');
    }

    public function registerPost(Request $request){

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required'
        ]);

        User::create($data);
        return back()->with('success', 'Register succcessfully!');
    }

    public function login() {
        return view('user.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
            'role' => 'required|in:admin,rider,user',
        ]);

        if (Auth::attempt($credentials)) {

            if (auth()->user()->role !== $request->role) {
                Auth::logout(); // Log out the user if roles don't match
                return back()->with('error', 'Invalid role for this login form.');
            }
            switch(auth()->user()->role) {
                case 'admin':
                    return redirect('/admin/dashboard') ->with('success', 'Login Successfully!');
                    break;
                case 'rider': 
                    return redirect('/rider/dashboard') ->with('success', 'Login Successfully!');
                    break;
                case 'user':
                    return redirect('/home') ->with('success', 'Login Successfully!');
                    break;
            }
        }
         return back()->with('error', 'Email or password incorrect.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


}
