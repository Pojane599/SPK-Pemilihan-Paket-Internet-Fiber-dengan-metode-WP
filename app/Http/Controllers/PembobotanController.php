<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PembobotanController extends Controller
{
    public function index()
    {
        $bobot = Bobot::with('user')->paginate(5);
        $users = User::all();
        $columns = Schema::getColumnListing('pembobotan');
        $exclude = ['id', 'created_at', 'updated_at'];
        $columnsBobot = array_diff($columns, $exclude);
        return view('admin.pembobotan', compact('bobot', 'columnsBobot', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'users_id' => 'required',
            // sesuaikan validasi untuk kolom lainnya
        ]);

        $input = $request->all();
        $input['created_at'] = now(); // atur created_at saat tambah
        Bobot::create($input);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, Bobot $bobot)
    {
        $request->validate([
            'users_id' => 'required',
            // sesuaikan validasi untuk kolom lainnya
        ]);

        $input = $request->all();
        $input['updated_at'] = now(); // atur updated_at saat edit
        $bobot->update($input);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy(BObot $bobot)
    {
        $bobot->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
