<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    
    public function index()
    {
        return view('admin.services',['services'=>Service::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'string|max:15|min:5'
        ]);

        Service::create([
            'name' => $request->name
        ]);

        $request->session()->flash('alert',['status'=> 'success','msg'=>'You have successfully created a new service']);
        return redirect()->route('services.all');
    }

    public function remove($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return back();
    }

}
