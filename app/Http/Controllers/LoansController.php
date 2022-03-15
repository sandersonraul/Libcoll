<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Book;

class LoansController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $this->authorize('is_admin');
        $loans = Loan::all();
        return view('loans.index', ['loans'=>$loans]);
    }

    public function create() {
        $this->authorize('is_admin');
        $data = Book::where('status',1)->get();
        return view('loans.create', ['data'=>$data]);
    }

    public function store(Request $request) {
        $this->authorize('is_admin');
        $loan = new Loan;
        $user = auth()->user();
        $loan->user_id = $user->id;
        $loan->book_id = $request->book_id;
        $loan->borrowed_at = $request->borrowed_at;
        $loan->devolution_date = $request->devolution_date;
        $loan->returned_at = $request->returned_at;

        $loan->save();

        return redirect('/')->with('msg', 'Created sucessfully');
    }

    public function approve($id){
        $this->authorize('is_admin');
        $data = Loan::findOrFail($id);
        $data->status ='approved';
        $data->save();
        $book = Book::find($data->book_id);
        $book->status = 0;
        $book->save();
        return redirect()->back();
    }

    public function reject($id){
        $this->authorize('is_admin');
        $data = Loan::findOrFail($id);
        $data->status ='rejected';
        $data->save();
        return redirect()->back();
    }

    public function returnBook($id){
        $this->authorize('is_admin');
        $data = Loan::findOrFail($id);
        $data->status = 'returned';
        $data->save();
        $book = Book::find($data->book_id);
        $book->status = 1;
        $book->save();
        return redirect()->back();
    }

}
