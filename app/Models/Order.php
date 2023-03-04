<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    public function ticket(){
        return $this->hasMany('App/Models/Ticket');
    }
}
