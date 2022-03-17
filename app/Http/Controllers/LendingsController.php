<?php

namespace App\Http\Controllers;
use App\Models\Lending;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class LendingsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $this->authorize('is_admin');
        $lendings = Lending::all();
        return view('Lendings.index', ['lendings'=>$lendings]);
    }

    public function create() {
        $this->authorize('is_admin');
        $users = User::all();
        $data = Book::where('status','<>',0)->get();
        return view('Lendings.create', ['data'=>$data, 'users'=>$users]);
    }

    public function store(Request $request) {
        $this->authorize('is_admin');
        $lending = new Lending;
        $lending->user_id = $request->user_id;
        $lending->book_id = $request->book_id;
        $book = Book::find($request->book_id);
        $book->status = 0;
        $lending->borrowed_at = $request->borrowed_at;
        $lending->devolution_date = $request->devolution_date;
        $lending->returned_at = $request->returned_at;
        $booking = Booking::where('user_id', $lending->user_id)->where('book_id', $lending->book_id);
        $lending->save();
        $book->save();
        $booking->delete();
        return redirect('/lendings/index')->with('msg', 'Created sucessfully');
    }

    public function returnBook($id){
        $this->authorize('is_admin');
        $data = Lending::findOrFail($id);
        $data->status = 'returned';
        $data->returned_at = Carbon::now();
        $data->save();
        $book = Book::find($data->book_id);
        $book->status = 1;
        $book->save();
        return redirect()->back();
    }
}
