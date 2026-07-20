<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $table = 'ticket';
    protected $fillable = [
        'event_id',
        'title',
        'description',
        'location',
        'price',
        'status',
         
    ];
    
}
