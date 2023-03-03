<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $dates = ['date'];
    protected $guarded = [];

    public function film(){
        return $this->belongsTo('App/Models/Film');
    }
}
