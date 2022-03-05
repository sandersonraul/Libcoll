<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $userType = Auth::user()->userType;

        if($userType == 'admin'){
            return view('admin.adminDashboard');
        }
        if($userType == 'librarian'){
            return view('librarian.librarianDashboard');
        } else{
            return view('dashboard');
        }
    }
}
