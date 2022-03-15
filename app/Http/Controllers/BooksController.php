<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;



class BooksController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function create(){
        $this->authorize('is_admin');
        return view('books.create');
    }

    public function store(Request $request){
        $this->authorize('is_admin');
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->category = $request->category;
        $book->description = $request->description;
        $book->publishing_company = $request->publishing_company;
        $book->published_at = $request->published_at;

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('images/books'), $imageName);

            $book->image = $imageName;

        }

        $book->save();
        return redirect('/show/books')->with('success', 'Book created successfully');
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

    public function update(Request $request){
        $this->authorize('is_admin');

        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('images/books'), $imageName);

            $data['image'] = $imageName;

        }

        Book::findOrFail($request->id)->update($data);
        return redirect('/show/books')->with('sucess', 'book updated successfully');
    }
}
