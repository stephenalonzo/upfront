<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'name',
        'email',
        'subject',
        'description',
        'files'
    ];

    public function users()
    {

        return $this->belongsTo(User::class);

    }

    public function categories()
    {

        return $this->belongsToMany(Category::class);

    }

    public function priorities()
    {

        return $this->belongsToMany(Priority::class);

    }

    public function agents()
    {

        return $this->belongsToMany(Agent::class);

    }

    public function responses()
    {

        return $this->belongsToMany(Response::class);

    }

    public function statuses()
    {

        return $this->belongsToMany(Status::class);

    }

}
