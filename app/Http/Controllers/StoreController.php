<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function decrypId($id){
        try {
            return Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function TokoMember()
    {
        // ambil toko milik user (bisa null)
        $toko = Store::where('users_id', Auth::id())->first();

        // ambil produk hanya jika toko ada, kalau nggak ada beri collection kosong
        $products = $toko ? Product::where('stores_id', $toko->id)->get() : collect();

        // selalu kirim variabel 'toko' dan 'products' ke view
        return view('Member.Toko.toko-member', ['toko' => $toko,'products' => $products,]);
    }

    public function TokoMemberCreate(Request $request)
    {
        $validate = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string|max:500',
            'kontak_toko' => 'required|string|max:15',
        ]);

        $image = $request->file('gambar');
        $filename = time(). "-" . $request->judul . "." . $image->getClientOriginalExtension();
        $image->storeAs('public/gambar-toko', $filename);
        $validate['gambar'] = $filename;
        
        Store::create(
            [
                'nama_toko' => $validate['nama_toko'],
                'deskripsi' => $validate['deskripsi'],
                'gambar' => $validate['gambar'],
                'alamat' => $validate['alamat'],
                'kontak_toko' => $validate['kontak_toko'],
                'users_id' => Auth::id(),
            ]
        );
        return redirect()->route('toko.member')->with('pesan', 'Toko berhasil dibuat.');
    }

    public function Store(Request $request){
        $data['user'] = User::all();
        $validate = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string|max:500',
            'kontak_toko' => 'required|string|max:15',
            'users_id' => 'required|unique:stores|exists:users,id',
        ]);

        // Cegah user membuat toko lebih dari 1 (karena users_id unique)
        if (Store::where('users_id', $request->users_id)->exists()) {
            return back()->withErrors(['User ini sudah memiliki toko.']);
        }

        $image = $request->file('gambar');
        $filename = time(). "-" . $request->judul . "." . $image->getClientOriginalExtension();
        $image->storeAs('public/gambar-toko', $filename);
        $validate['gambar'] = $filename;
        
        Store::create($validate);
        return redirect()->route('toko.admin')->with('pesan', 'Toko berhasil dibuat.');
    }


    public function Update(Request $request, String $id){
        $id = $this->decrypId($id);

        $validate = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string|max:500',
            'kontak_toko' => 'required|string|max:15',
        ]);

        $toko = Store::findOrFail($id);
        if($request->hasFile('gambar')){
            if(Storage::exists('public/gambar-toko/'.$toko->gambar)){
                Storage::delete('public/gambar-toko/' . $toko->gambar);
            }
            $image = $request->file('gambar');
            $filename = time(). "-" . $request->judul . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/gambar-toko', $filename);
            $validate['gambar'] = $filename;
        }

        $toko->update($validate);
        return redirect()->route('toko.admin')->with('sukses','Berhasil mengubah toko');
    }

    public function Delete(String $id)
    {
        $id = $this->decrypId($id);
        $toko = Store::findOrFail($id);
        if(Storage::exists('public/gambar-foto/'.$toko->gambar)){
            Storage::delete('public/gambar-foto/'.$toko->gambar);
        }
        $toko->delete();
        return redirect()->back()->with('sukses','Toko berhasil dihapus.');
    }

    public function Detail(String $id){
        $id = $this->decrypId($id);
        $data['store'] = Store::with('user')->findOrFail($id);

        // ambil produk hanya milik toko ini + eager load gambar
        // GANTI 'imageProducts' => kalau di Product model kamu namakan relasi 'images', ubah jadi 'images'
        $data['products'] = $data['store']->products()->with(['imageProducts'])->get();
        return view('Member.Toko.toko-detail', $data);
    }
}
