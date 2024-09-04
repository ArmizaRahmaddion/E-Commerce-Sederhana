<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function LihatUser()
    {
        $users = User::all(); // Ambil semua data 
        return view('User.list', compact('users'));;
    }
}
