<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseTicket extends Model
{
    use HasFactory;

    public $table = 'response_ticket';
    public $timestamps = false;

    protected $fillable = [
        'response',
        'response_id',
        'user_id',
        'ticket_id'
    ];

}
