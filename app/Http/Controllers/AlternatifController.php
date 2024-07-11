<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use App\Models\Karakter;
use App\Models\Produk;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{

    public function alternatif()
    {
        $produk = Produk::paginate(5);
        return view('admin.alternatif', compact('produk'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->created_at = now();
        $produk->bandwidth = null;
        $produk->batas_penggunaan = null;
        $produk->jumlah_perangkat = null;
        $produk->downgrade_speed = null;
        $produk->harga = null;
        $produk->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $produk->nama = $request->nama;
        $produk->updated_at = now();
        $produk->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
