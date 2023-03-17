<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'priority_id',
        'ticket_id'
    ];

    public function tickets()
    {

        return $this->belongsToMany(Ticket::class);

    }
    
}
