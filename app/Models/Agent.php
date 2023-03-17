<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'agent_id',
        'ticket_id'
    ];

    public function tickets()
    {

        return $this->belongsToMany(Ticket::class);

    }

}
