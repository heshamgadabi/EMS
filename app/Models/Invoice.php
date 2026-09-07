<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    protected $fillable = [
                            'user_id',
                            'event_id',
                            'total_amount',
                            'status',
                           ];

    
    public function tickets()
    {
        return $this->belongsToMany(Ticket::class, 'invoice_ticket')
                    ->withPivot(['ticket_title', 'quantity', 'unit_price', 'total_price'])
                    ->withTimestamps();
    }                       

}
