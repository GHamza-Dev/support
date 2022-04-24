<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;

class UserController extends Controller
{
    
    public function index()
    {
        return view('admin.users',['users'=>User::getUsers(),'services'=>Service::all()]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
