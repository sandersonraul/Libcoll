<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class IndexController extends Controller
{
    public function index(){
        $books = Book::where('status', 1)->orderBy('created_at', 'desc')->get()->chunk(6);
        return view('index', ['books'=> $books]);
    }

    public function show(){
        $books = Book::orderBy('title', 'asc')->get();
        return view('catalog', ['books'=> $books]);
    }
}
