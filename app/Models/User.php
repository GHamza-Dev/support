<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;


    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
    ];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUsers()
    {
        return DB::table('users')
               ->where('role','!=',1)
               ->paginate(6);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
