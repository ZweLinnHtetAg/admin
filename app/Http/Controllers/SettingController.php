<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function checkPassword($password)
    {
      if (Hash::check($password, Auth::user()->password)) 
      {
          $flag = "true";
      }
      else {
          $flag = "false";
      }

    return $flag;

    }

    public function changePassword($password)
    {
        Auth()->user()->update(['password' => Hash::make($password)]);
        return response()->json(['success' => "Password is updated"], 201);  
    }
}
