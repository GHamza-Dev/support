<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth::user()->id;
        $tickets = User::find($user_id)->tickets;

        // $tickets = DB::table('users')
        //     ->join('tickets','tickets.user_id','=','users.id')
        //     ->leftJoin('answers','answers.ticket_id','=','tickets.id')
        //     ->where('users.id','=',$user_id)
        //     ->select('users.*','tickets.*')
        //     // ->select(DB::raw('count(answers.ticket_id) as nbr'))
        //     // ->groupBy('answers.ticket_id')
        //     // ->distinct('answers.ticket_id')
        //     ->get();

        // dd($tickets);
        // // dd(auth::user());

        return view('user.tickets',['tickets'=>$tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.addticket',['services'=>Service::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:20',
            'service_id' => 'required|integer',
            'description' => 'required|string|min:20'
        ]);

        $ticket = Ticket::create([
            'user_id'=> auth()->user()->id,
            'title' => $request->title,
            'service_id' => $request->service_id,
            'description' => $request->description,
        ]);

        $request->session()->flash('alert',['status'=> 'success','msg'=>'You have successfully created a ticket']);
        return redirect()->route('create.ticket');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = DB::table('tickets')
                ->join('users','users.id','=','user_id')
                ->select('users.fname','users.lname','tickets.*')
                ->where('tickets.id','=',$id)
                ->get();
        return view('answers',['ticket'=>$ticket[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
