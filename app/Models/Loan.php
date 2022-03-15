<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['borrowed_at','devolution_date'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function book(){
        return $this->belongsTo('App\Models\Book');
    }
}
