<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Booking;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DateTime;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $bookings = Booking::all();

        $currentDate = Carbon::now();
        foreach($bookings as $booking){
            if($booking->book->status == 2 && $booking->withdraw < $currentDate){
                $book = Book::find($booking->book_id);
                $book->status = 1;
                $book->save();
                $booking->delete();
            }
        }
    }
}
