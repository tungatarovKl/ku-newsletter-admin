<?php

namespace App\Http\Controllers;

use App\Events\DBConnectionError;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //Only for authenticated users
    public function __construct()
    {
        $this->middleware('auth');
    }

    //List of users
    public function usersGet(Request $request){

        try {
            $users = User::all(["first_name", "last_name", "username"]);
            return view('users/users')->with(array('users' => $users));
        } catch (\Throwable $e){
            DBConnectionError::dispatch($e->getMessage());
        }

        return view('users/users')->with('error', 'Ошибка связи с базой данных');
    }

    //GET request for user creation
    public function createUserGET(Request $request){
        return view('users/createUser');
    }

    //POST request for user creation
    public function createUserPOST(Request $request){

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        $data = $request->all();
        User::create([
            'first_name' => $data['firstName'],
            'last_name' => $data['lastName'],
            'username' => $data['username'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('/users')->with('success', 'Registered');
    }
}