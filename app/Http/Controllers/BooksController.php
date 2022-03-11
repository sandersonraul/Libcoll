<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;



class BooksController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->user = $user;
    }


    public function create(){
        $this->authorize('is_admin');
        return view('books.create');
    }

    public function store(Request $request){
        $this->authorize('is_admin');
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'image' => $request->image,
            'category' => $request->category,
            'description' => $request->description,
            'publishing_company' => $request->publishing_company,
            'published_at' => $request->published_at,
        ]);
        return redirect('/show/books');
    }

    public function show($id){
        $this->authorize('is_admin');
        $book = Book::findOrFail($id);
        return view('books.show', ['book' => $book]);
    }

    public function showAll(){
        $this->authorize('is_admin');
        $books = Book::all();
        return view('books.showAll',['books' => $books]);
    }

    public function destroy($id){
        $this->authorize('is_admin');
        $book=Book::findOrFail($id);
        $book->delete();
        return redirect('/show/books');
    }

    public function edit($id){
        $this->authorize('is_admin');
        $book = Book::findOrFail($id);
        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, $id){
        $this->authorize('is_admin');
        $book = Book::findOrFail($id);
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'image' => $request->image,
            'category' => $request->category,
            'description' => $request->description,
            'publishing_company' => $request->publishing_company,
            'published_at' => $request->published_at,
        ]);
        return redirect('/show/books');
    }
}
