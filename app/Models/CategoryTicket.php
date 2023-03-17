<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTicket extends Model
{
    use HasFactory;

    public $table = 'category_ticket';
    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'ticket_id'
    ];
    
}
