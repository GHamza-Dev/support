<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Service;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{

    public function index()
    {
        $user_id = auth::user()->id;
    
        $tickets = DB::table('tickets')
            ->leftJoin('answers', 'tickets.id', '=', 'answers.ticket_id')
            ->select('tickets.*', DB::raw('count(answers.id) as answers_count'))
            ->where('tickets.user_id', $user_id)
            ->groupBy('tickets.id')
            ->get();
         
        return view('user.tickets',['tickets'=>$tickets]);
    }

    public function search(Request $request){
        $user_id = auth::user()->id;
        $tickets = [];

        if ($request->term == 1) {
            $tickets = Ticket::query()
            ->where('user_id','=',$user_id) 
            ->where('title', 'LIKE', "%{$request->search}%") 
            ->get();
        }elseif($request->term == 2){
            $tickets = Ticket::query()
            ->join('services','services.name','=',$request->search)
            ->where('user_id','=',$user_id) 
            ->where('title', 'LIKE', "%{$request->search}%") 
            ->get();
        }

        return view('user.tickets',['tickets'=>$tickets]);
    }

    public function create()
    {
        return view('user.addticket',['services'=>Service::all()]);
    }

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

    public function show($id)
    {
        $ticket = DB::table('tickets')
                ->join('users','users.id','=','user_id')
                ->select('users.fname','users.lname','tickets.*')
                ->where('tickets.id','=',$id)
                ->get();
        
        $answers = Answer::all()->where('ticket_id','=',$id);
        
        return view('answers',['ticket'=>$ticket[0],'answers'=>$answers]);
    }

    public function solve($id){
        $ticket = Ticket::findOrFail($id);
        $ticket->status = 'solved';
        $ticket->save();
        return back();
    }
    
    public function close($id){
        $ticket = Ticket::findOrFail($id);
        $ticket->status = 'closed';
        $ticket->save();
        return back();
    }
}
