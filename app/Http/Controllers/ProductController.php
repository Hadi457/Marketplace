<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    public function decrypId($id){
        try {
            return Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
    }

    public function Index(){
        return view('produk');
    }

    public function Create()
    {
        $data['categories'] = Category::all();

        // Ambil toko milik user login
        $data['store'] = Store::where('users_id', Auth::id())->first();

        if (!$data['store']) {
            return redirect()->back()->with('error', 'Anda belum memiliki toko.');
        }

        return view('Member.Produk.produk-create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'categories_id' => 'required|exists:categories,id',
            'stores_id' => 'required|exists:stores,id',
            'nama_produk' => 'required|string|max:100',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'deskripsi' => 'required|string',
            'tanggal_upload' => 'required|date',
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $product = Product::create([
            'categories_id' => $request->categories_id,
            'stores_id' => $request->stores_id, // otomatis dari hidden input
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'tanggal_upload' => $request->tanggal_upload,
        ]);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $img) {

                $filename = time() . '_' . uniqid() . '.' . $img->getClientOriginalExtension();
                $img->storeAs('public/gambar-produk', $filename);

                ImageProduct::create([
                    'products_id' => $product->id,
                    'nama_gambar' => $filename,
                ]);
            }
        }
        return redirect()->back()->with('pesan', 'Produk berhasil ditambahkan!');
    }


    public function Detail($id){
        $id = $this->decrypId($id);
        $data['product'] = Product::with(['imageProducts', 'category', 'store'])->findOrFail($id);
        return view('Member.Produk.produk-detail', $data);
    }
}
