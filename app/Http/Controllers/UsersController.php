<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->user = $user;
    }

    public function create(){
        $this->authorize('is_admin');
        return view('users.create');
    }

    public function store(Request $request){
        $this->authorize('is_admin');
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userType' => $request->userType,
            'password' => Hash::make($request['password']),
        ]);
        return  'criado com sucesso';
    }

    public function show($id){
        $this->authorize('is_admin');
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    public function showAll(){
        $this->authorize('is_admin');
        $users = User::orderBy('created_at', 'desc')->get();
        return view('users.showAll',['users' => $users]);
    }
}
