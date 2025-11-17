<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function Index(){
        return view('toko');
    }
    public function TokoMember(){
        $data['toko'] = Store::where('users_id', Auth::id())->first();
        return view('Administrator.Toko.toko-member', $data);
    }
    public function TokoMemberCreate(Request $request){
        $validate = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string|max:500',
            'kontak_toko' => 'required|string|max:15',
        ]);

        // Upload & simpan gambar ke folder storage/gambar-toko
        $image = $request->file('gambar');
        $filename = time(). "-" . $request->judul . "." . $image->getClientOriginalExtension();
        $image->storeAs('public/gambar-toko', $filename);
        $validate['gambar'] = $filename;
        
        // Simpan Toko ke databse
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


        // Upload & simpan gambar ke folder storage/gambar-toko
        $image = $request->file('gambar');
        $filename = time(). "-" . $request->judul . "." . $image->getClientOriginalExtension();
        $image->storeAs('public/gambar-toko', $filename);
        $validate['gambar'] = $filename;
        
        // Simpan Toko ke databse
        Store::create($validate);
        return redirect()->route('toko.admin')->with('pesan', 'Toko berhasil dibuat.');
    }
    public function Update(Request $request, $id)
    {
        $toko = Store::findOrFail($id);

        $validate = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string|max:500',
            'kontak_toko' => 'required|string|max:15',
            'users_id' => 'required|exists:users,id|unique:stores,users_id,' . $toko->id,
        ]);

        // Cek apakah user ini memiliki toko lain
        if (Store::where('users_id', $request->users_id)->where('id', '!=', $toko->id)->exists()) {
            return back()->withErrors(['User ini sudah memiliki toko lain.']);
        }

        // Jika user upload gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama jika ada
            if ($toko->gambar && file_exists(storage_path('app/public/gambar-toko/' . $toko->gambar))) {
                unlink(storage_path('app/public/gambar-toko/' . $toko->gambar));
            }

            // Upload gambar baru
            $image = $request->file('gambar');
            $filename = time() . "-" . $request->nama_toko . "." . $image->getClientOriginalExtension();
            $image->storeAs('public/gambar-toko', $filename);

            $validate['gambar'] = $filename;
        }

        // Update data toko
        $toko->update($validate);

        return redirect()->route('toko.admin')->with('pesan', 'Toko berhasil diperbarui.');
    }

    public function Delete(String $id){
        $id = $this->decrypId($id);
        $toko = Store::findOrFail($id);
        if(Storage::exists('public/gambar-foto/'.$toko->file)){
            Storage::delete('public/gambar-foto/'.$toko->file);
        }
        $toko->delete();
        return redirect()->back()->with('sukses','Toko berhasil dihapus.');
    }
    public function decrypId($id){
        try {
            return Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
    }
    public function Detail(String $id){
        $id = $this->decrypId($id);
        $data['store'] = Store::findOrFail($id);
        return view('toko', $data);
    }
}
