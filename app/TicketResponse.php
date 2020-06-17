<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketResponse extends Model
{
    protected $fillable = ['agent_id', 'ticket_id', 'response'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class,'agent_id');
    }
}
