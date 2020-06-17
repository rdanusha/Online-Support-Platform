<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['subject', 'description', 'customer_name', 'email', 'phone', 'status', 'reference_number'];

    public function ticketResponse()
    {
        return $this->hasMany(TicketResponse::class);
    }

}
