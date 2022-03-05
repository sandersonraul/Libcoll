<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;



class BooksController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function create(){
        return view('books.create');  
    }

    public function store(Request $request){
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'image' => $request->image,
            'category' => $request->category,
            'description' => $request->description,
            'publishing_company' => $request->publishing_company,
            'amount' => $request->amount,
            'published_at' => $request->published_at,
        ]);
        return redirect('/show/books');
    }

    public function show(){
        $books = Book::all();
        return view('books.showAll',['books' => $books]);
    }

    public function destroy($id){
        $book=Book::findOrFail($id);
        $book->delete();
        return redirect('/show/books');
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, $id){
        $book = Book::findOrFail($id);
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'image' => $request->image,
            'category' => $request->category,
            'description' => $request->description,
            'publishing_company' => $request->publishing_company,
            'amount' => $request->amount,
            'published_at' => $request->published_at,
        ]);
        return redirect('/show/books');
    }
}
