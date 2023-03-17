<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentTicket extends Model
{
    use HasFactory;

    public $table = 'agent_ticket';
    public $timestamps = false;

    protected $fillable = [
        'agent_id',
        'ticket_id'
    ];

}
