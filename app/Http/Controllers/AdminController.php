<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function profile(User $user)
    {
        return view('admin.profile',compact('user'));
    }

    public function listPendaftar()
    {
        $data = array();
        return view('admin.listPendaftar',compact('data'));
    }

    public function kotakMasuk()
    {
        $data = array();
        return view('admin.kotakMasuk',compact('data'));
    }
}
