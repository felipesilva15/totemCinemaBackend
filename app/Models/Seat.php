<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $dates = ['reserved'];

    public function session(){
        return $this->belongsTo('App/Models/Session');
    }

    public function ticket(){
        return $this->hasMany('App/Models/Ticket');
    }
}
