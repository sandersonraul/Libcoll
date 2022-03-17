<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $dates = [
        'withdraw'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function book(){
        return $this->belongsTo('App\Models\Book');
    }
}
