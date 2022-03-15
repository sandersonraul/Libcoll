<?php

namespace App\Http\Controllers;
use stdClass;
use Illuminate\Http\Request;
use App\Models\User;

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

        $users = $this->user->paginate(5);

        return view('dashboard',['users'=>$users,
                            'user_counters'=>$user_counters]);
    }
}
