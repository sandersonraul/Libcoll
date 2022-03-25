<?php

namespace App\Http\Controllers;
use stdClass;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Booking;

class HomeController extends Controller
{

    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }


    public function dashboard()
    {

        $user_counters = new stdClass;
        $user_counters->all_users = $this->user->all()->count();
        $user_counters->admin_users = $this->user->where('userType','admin')->count();
        $user_counters->librarian_users = $this->user->where('userType','librarian')->count();
        $user_counters->users = $this->user->where('userType','user')->count();
        $books = Book::all()->count();
        $user = auth()->user();
        $bookings = Booking::where('user_id',$user->id)->get();
        $users = $this->user->paginate(5);
        return view('dashboard',['users'=>$users,'user_counters'=>$user_counters, 'books'=> $books, 'bookings'=>$bookings]);
    }
}
