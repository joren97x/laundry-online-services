<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{



    public function loginHandler(Request $request) 
    {
        dd('he');
        $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL)? 'email' : 'name';

        if($fieldType == 'email') {
            $request->validate([
                'login_id' => 'required|email|exists:admins,email',
                'password' => 'required|min:5|max:45'
            ], [
                'login_id.required' => 'Email is required.',
                'login_id.email'=> 'Invalid email address.',
                'login_id.exists'=> 'Email does not exists in system.',
                'password.required' => 'Password is required'
            ]);
        } else {
            $request->validate ([
                'login_id' => 'required|exists:admins,name',
                'password' => 'required|min:5|max:45'
            ],[
                'login_id.required'=>'Email is required.',
                'login_id.exists' => 'Email is not exists in system.',
                'password.required' => 'Password is required.'
            ]);
        }

        $creds = array(
            $fieldType => $request->login_id,
            'password' => $request->password
        );

        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.dashboard');
        } else {
            session()->flash('fail', 'Incorrect credentials.');
            return redirect()->route('admin.login');
        }
    }

        public function logoutHandler(Request $request) 
        {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login');

        }

}
