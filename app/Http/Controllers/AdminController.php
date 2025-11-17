<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller
{
    public function decrypId($id){
        try {
            return Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
    }
    public function Dashboard(){
        return view('Administrator.dashboard');
    }
    public function Beranda(){
        $data['stores'] = Store::all();
        $data['users'] = User::all();
        return view('beranda', $data);
    }
    public function User($id = null){
        if ($id) {
            $id = $this->decrypId($id);
            $data['users'] = User::findOrFail($id);
        }
        $data['users'] = User::all();
        return view('Administrator.user', $data);
    }
    public function Toko($id = null)
    {
        $data['user'] = User::all(); // data user aman

        if ($id) {
            $id = $this->decrypId($id);
            $data['store'] = Store::findOrFail($id); // store satuan
        }

        $data['stores'] = Store::all(); // semua store
        return view('Administrator.Toko.toko', $data);
    }

}
