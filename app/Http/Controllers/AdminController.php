<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('Administrator.dashboard');
    }
    public function beranda(){
        return view('beranda');
    }
}
