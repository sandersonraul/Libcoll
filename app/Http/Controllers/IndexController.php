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
        $books = Book::orderBy('title', 'asc')->paginate(8);
        return view('catalog', ['books'=> $books]);
    }

    public function showBook($id){
        $book = Book::findOrFail($id);
        return view('book', ['book' => $book]);
    }
}
