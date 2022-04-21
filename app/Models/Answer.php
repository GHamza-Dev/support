<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'ticket_id',
        'user_id',
    ];

    public static function getTicketAnswers($ticket_id){
        return DB::table('answers')
               ->leftJoin('users','users.id','=','answers.user_id')
               ->where('ticket_id','=',$ticket_id)
               ->select('users.role','answers.*')
               ->get(); 
    }

}
