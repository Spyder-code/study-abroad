<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SuperController extends Controller
{
    public function index()
    {
        return view('super.index');
    }

    public function profile(User $user)
    {
        return view('super.profile', compact('user'));
    }
}
