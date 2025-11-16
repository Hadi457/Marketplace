<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Dashboard(){
        return view('Administrator.dashboard');
    }
    public function Beranda(){
        return view('beranda');
    }
    public function User(){
        return view('Administrator.user');
    }
    public function Toko(){
        return view('Administrator.Toko.toko');
    }
}
