<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTicket extends Model
{
    use HasFactory;

    public $table = 'status_ticket';
    public $timestamps = false;

    protected $fillable = [
        'status_id',
        'ticket_id'
    ];

}
