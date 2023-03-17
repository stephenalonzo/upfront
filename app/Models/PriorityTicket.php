<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriorityTicket extends Model
{
    use HasFactory;

    public $table = 'priority_ticket';
    public $timestamps = false;

    protected $fillable = [
        'priority_id',
        'ticket_id'
    ];

}
