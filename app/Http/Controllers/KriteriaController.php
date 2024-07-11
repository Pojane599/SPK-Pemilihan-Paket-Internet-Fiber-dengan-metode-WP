<?php

namespace App\Http\Controllers;

use App\Models\TipeKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class KriteriaController extends Controller
{
    public function index()
    {
        $tipe = TipeKriteria::all();
        $columns = Schema::getColumnListing('table_product');
        $exclude = ['id', 'created_at', 'updated_at', 'nama'];
        $columnsOrder = array_diff($columns, $exclude);

        // Gabungkan tipe kriteria dengan kolom berdasarkan nama yang sama
        $kriteria = [];
        foreach ($columnsOrder as $column) {
            $nama_kriteria = ucfirst(str_replace('_', ' ', $column));
            $tipe_kriteria = $tipe->firstWhere('nama', $column);
            $kriteria[] = [
                'nama' => $column,
                'tipe' => $tipe_kriteria ? $tipe_kriteria->tipe : 'Tidak ada'
            ];
        }

        return view('admin.kriteria', compact('kriteria'));
    }

    public function store(Request $request)
    {
        $nama = $request->input('nama');
        $tipe = $request->input('tipe');

        TipeKriteria::create([
            'nama' => $nama,
            'tipe' => $tipe,
        ]);

        // Lakukan validasi jika nama tidak boleh kosong

        // Tambahkan kolom baru dengan tipe data decimal ke dalam tabel nilai
        Schema::table('table_product', function ($table) use ($nama) {
            $table->decimal($nama, 8, 2)->nullable();
        });

        // Perbarui kolom 'w' pada tabel pembobotan
        $this->updatePembobotanTable();

        // Redirect atau kembali ke halaman yang diinginkan setelah proses penambahan
        return redirect()->back()->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function updatePembobotanTable()
    {
        // Dapatkan kolom 'w' terakhir dari tabel pembobotan
        $lastWColumn = DB::table('information_schema.columns')
            ->select('column_name')
            ->where('table_schema', env('DB_DATABASE')) // Tambahkan ini untuk memastikan bahwa kita bekerja di database yang benar
            ->where('table_name', 'pembobotan')
            ->where('column_name', 'like', 'w%')
            ->orderBy('ordinal_position', 'desc') // Pastikan urutan kolom benar berdasarkan posisinya
            ->first();

        // Logging kolom terakhir
        Log::info('Kolom W terakhir: ' . ($lastWColumn ? $lastWColumn->column_name : 'Tidak ada'));

        if ($lastWColumn) {
            // Extract nomor 'w' terakhir
            $lastWNumber = intval(substr($lastWColumn->column_name, 1));
        } else {
            // Jika tidak ada kolom 'w' sebelumnya, atur nomor 'w' awal
            $lastWNumber = 0;
        }

        // Tambahkan kolom 'w' berikutnya pada tabel pembobotan
        $newWColumn = 'w' . ($lastWNumber + 1);

        // Logging untuk pengecekan
        Log::info('Menambahkan kolom baru: ' . $newWColumn);

        // Cek apakah kolom sudah ada sebelum menambahkan
        if (!Schema::hasColumn('pembobotan', $newWColumn)) {
            Schema::table('pembobotan', function ($table) use ($newWColumn) {
                $table->decimal($newWColumn, 8, 2)->nullable();
            });
            Log::info('Kolom ' . $newWColumn . ' berhasil ditambahkan.');
        } else {
            Log::info('Kolom ' . $newWColumn . ' sudah ada.');
        }
    }

    public function update(Request $request, $column)
    {
        // Validasi request jika diperlukan
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|string|in:Benefit,Cost',
        ]);

        $namaKolom = str_replace(' ', '_', strtolower($request->input('nama')));
        $tipe = $request->input('tipe');

        // Perbarui nama kolom dalam tabel nilai
        DB::statement("ALTER TABLE `table_product` CHANGE `$column` `$namaKolom` VARCHAR(255)");


        // Perbarui nama dan tipe dalam tabel TipeKriteria
        TipeKriteria::where('nama', $column)->update([
            'nama' => $namaKolom,
            'tipe' => $tipe,
        ]);

        // Redirect atau kembali ke halaman yang diinginkan setelah proses update
        return redirect()->back()->with('success', 'Kriteria berhasil diperbarui.');
    }


    public function delete(Request $request, $column)
    {
        try {
            // Validasi apakah kolom yang ingin dihapus memang ada dalam tabel
            if (!Schema::hasColumn('table_product', $column)) {
                throw new \Exception('Kolom tidak ditemukan.');
            }

            // Dapatkan kolom 'w' yang terkait dengan kolom yang akan dihapus
            $lastWColumn = DB::table('information_schema.columns')
                ->select('column_name')
                ->where('table_schema', env('DB_DATABASE'))
                ->where('table_name', 'pembobotan')
                ->where('column_name', 'like', 'w%')
                ->orderBy('ordinal_position', 'desc')
                ->first();

            if (!$lastWColumn) {
                throw new \Exception('Kolom W tidak ditemukan di tabel pembobotan.');
            }

            // Proses penghapusan kolom dari tabel menggunakan Schema Builder
            Schema::table('table_product', function ($table) use ($column) {
                $table->dropColumn($column);
            });

            // Hapus kolom 'w' terkait dari tabel pembobotan
            Schema::table('pembobotan', function ($table) use ($lastWColumn) {
                $table->dropColumn($lastWColumn->column_name);
            });

            TipeKriteria::where('nama', $column)->delete();

            // Redirect dengan pesan sukses jika penghapusan berhasil
            return redirect()->back()->with('success', 'Kolom berhasil dihapus.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error jika terjadi kesalahan
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
