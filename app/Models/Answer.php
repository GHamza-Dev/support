<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'ticket_id',
        'answerable_id',
        'answerable_type'
    ];

    public function answerable()
    {
        return $this->morphTo();
    }
}
