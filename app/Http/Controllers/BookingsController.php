<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $this->authorize('is_admin');
        $bookings = Booking::all();
        return view('bookings.index', ['bookings'=>$bookings]);
    }

    public function create() {
        $this->authorize('is_admin');
        return view('Bookings.create');
    }

    public function store(Request $request, $id) {
        $booking = new Booking;
        $book = Book::find($id);
        if($book->status == 1){
            $user = auth()->user();
            $booking->user_id = $user->id;
            $booking->book_id = $id;
            $booking->withdraw = Carbon::now()->addDay(2);
            $booking->save();
            $book->status = 2;
            $book->save();
            return redirect()->back()->with('msg', 'Resquest complete, you have two days to get your book at the library');
        } else{
            return redirect()->back()->with('msg', 'Book unavailable');
        }
    }
}
