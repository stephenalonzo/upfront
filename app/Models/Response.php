<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $fillable = [
        'response',
        'response_id',
        'user_id',
        'ticket_id'
    ];

    public function tickets()
    {

        return $this->belongsToMany(Ticket::class);

    }

    public function users()
    {

        return $this->belongsTo(User::class, 'user_id');

    }

}
