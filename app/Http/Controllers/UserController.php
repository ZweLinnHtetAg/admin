<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function getUsers()
    {
        return User::all();
    }

    public function emailCheck($email)
    {
        if(count(User::where('email',$email)->get()) == 0)
        {
            return response()->json(['status' => true], 200);
        }
        else 
        
        return response()->json(['status' => false], 200);
    }
}
