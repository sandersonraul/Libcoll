<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;




class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        $this->authorize('is_admin');
        $user = Auth::user();
        return view('users.create', ['user' => $user]);
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

    public function edit($id){
        $this->authorize('is_admin');
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id){
        $this->authorize('is_admin');
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'userType' => $request->userType,
            'password' => Hash::make($request['password']),
        ]);
        return redirect('/users/index')->with('sucess', 'User updated successfuly');
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
