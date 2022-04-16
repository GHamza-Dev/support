<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect()->route('admin.dashboard')->with('success','You logged in successfully');    
        }
        
        return back()->with('error','Invalide email address or password');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form');
    }

    public function dashboard()
    {
        return view('admin.index');
    }
}
