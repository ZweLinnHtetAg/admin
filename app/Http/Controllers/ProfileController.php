<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function edit()
    {
        return view('profile.edit');
    }

    public function checkPassword($password)
    {
        if (Hash::check($password, Auth::user()->password)) 
            $flag = "true";
        else 
            $flag = "false";

        return $flag;
    }

    public function changeNameEmail($name,$email)
    {
        Auth()->user()->update(['name'=>$name,'email'=>$email]);
        return response()->json(['success' => "Profile is updated"], 200);
    }

    public function changePassword($password)
    {
        Auth()->user()->update(['password' => Hash::make($password)]);
        return response()->json(['success' => "Password is updated"], 201);  
    }
}
