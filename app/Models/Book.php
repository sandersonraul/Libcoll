<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title','author','isbn','image','teste', 'category',
    'description', 'publishing_company', 'status', 'published_at'];

    protected $dates = [
        'published_at'
    ];

    public function loan(){
        return $this->hasOne('App\Models\Loan');
    }
}
