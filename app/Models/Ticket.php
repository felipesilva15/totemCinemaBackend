<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function seat(){
        return $this->belongsTo('App/Models/Seat');
    }

    public function ticketType(){
        return $this->belongsTo('App/Models/TicketType');
    }

    public function order(){
        return $this->belongsTo('App/Models/TicketType');
    }
}
