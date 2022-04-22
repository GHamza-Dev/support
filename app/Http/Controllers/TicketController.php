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

    public function index(Request $request)
    {
        $user_id = auth()->user()->role != 1 ? auth()->user()->id : null;

        if ($request->method() === 'POST') {
            $tickets = $this->search($request,$user_id);
        }else $tickets = Ticket::getAll($user_id); 
        
        return view('user.tickets',['tickets'=>$tickets,'services'=>Service::all()]);
    }

    public function getAllTickets(Request $request){

        if ($request->method() === 'POST') {
            $tickets = $this->search($request);
        }else $tickets = Ticket::getAll(); 
        
        return view('admin.index',['tickets'=>$tickets,'services'=>Service::all()]);
    }

    public function search(Request $request,$user_id = null){
        $tickets = [];

        if ($request->term == 1) {
            $tickets = Ticket::getByKeyword($request->search,$user_id);
        }elseif($request->term == 2){
            $tickets = Ticket::getByServiceId($request->service_id,$user_id);
        }elseif($request->term == 3){
            $tickets = Ticket::getByStatus($request->search,$user_id);
        }

        return $tickets;
    }

    public function create()
    {
        return view('user.addticket',['services'=>Service::all()]);
    }

    public function store(Request $request)
    {
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

        // dd($ticket);

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
        
        $answers = Answer::getTicketAnswers($id);
        
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
