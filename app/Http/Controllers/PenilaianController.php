<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PenilaianController extends Controller
{
    public function index()
    {
        $nilai = Produk::paginate(5);
        $columns = Schema::getColumnListing('table_product');
        $exclude = ['id', 'created_at', 'updated_at'];
        $columnsPenilaian = array_diff($columns, $exclude);
        return view('admin.penilaian', compact('nilai', 'columns', 'columnsPenilaian'));
    }

    public function store(Request $request)
    {
        $produk = new Produk();
        foreach ($request->except('_token') as $key => $value) {
            $produk->$key = $value;
        }
        $produk->save();

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, Produk $produk)
    {
        foreach ($request->except('_token', '_method') as $key => $value) {
            // Jika kolom 'harga', hilangkan semua karakter non-numeric
            if ($key == 'harga') {
                $value = preg_replace("/[^0-9]/", "", $value);
            }
            $produk->$key = $value;
        }
        $produk->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
