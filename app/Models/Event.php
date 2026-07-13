<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    //
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'location',
        'status',
        'created_by',
    ];

    /*
    const UPDATED_AT = null;
    const CREATED_AT = null;
*/


}
