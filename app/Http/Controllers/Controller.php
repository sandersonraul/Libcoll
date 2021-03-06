<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Booking;
use App\Models\Lending;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DateTime;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->validate();
        $this->deleteBooking();
    }

    public function validate(){
        $currentDate = Carbon::now();
        $lendings = Lending::all();
            foreach($lendings as $lending){
                if($lending->devolution_date < $currentDate && $lending->returned_at == null){
                    $user = User::find($lending->user_id);
                    $user->status = 0;
                    $user->save();
                }
            }
    }

    public function deleteBooking(){
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
