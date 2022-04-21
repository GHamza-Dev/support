<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'title',
        'description',
        'status'
    ];

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public static function _getTickets($uid = null){
        $tickets = DB::table('tickets')
            ->leftJoin('answers', 'tickets.id', '=', 'answers.ticket_id')
            ->join('users','tickets.user_id','=','users.id')
            ->select('tickets.*','users.fname','users.lname', DB::raw('count(answers.id) as answers_count'))
            ->groupBy('tickets.id');
            
        return $uid ? $tickets->where('tickets.user_id', $uid) : $tickets;
    }

    public static function getAll($uid = null){
        return self::_getTickets($uid)->paginate(8);
    }

    public static function getByKeyword($keyword,$uid = null){
        return self::_getTickets($uid)
            ->where('title', 'LIKE', "%{$keyword}%") 
            ->get();
    }
    
    public static function getByServiceId($sid,$uid = null){
        return self::_getTickets($uid)
            ->where('service_id','=',$sid) 
            ->get();
    }
    
    public static function getByStatus($status,$uid = null){
        return self::_getTickets($uid)
            ->where('status','LIKE',$status) 
            ->get();
    }

}
