<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $user_data=User::all();
        return view('user.list',compact('user_data'));
    }
}
