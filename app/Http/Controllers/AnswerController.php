<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    
    public function store(Request $request)
    {

        $request->validate([
            'content' => 'required|string',
            'ticket_id' => 'required|integer',
            'answerable_id' => 'required|integer'
        ]);

        $answer = Answer::create([
            'ticket_id'=> $request->ticket_id,
            'content' => $request->content,
            'answerable_id' => $request->answerable_id,
            'answerable_type' => trim(auth::user()->getTable(),'s'),
        ]);

        $ticket = Ticket::find($request->ticket_id);
        $ticket->status = 'answered';
        $ticket->save();

        return back();
    }

}
