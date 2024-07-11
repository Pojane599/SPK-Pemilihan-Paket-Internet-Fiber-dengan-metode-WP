<?php

namespace App\Http\Controllers;


use App\Models\Bobot;
use App\Models\Produk;
use App\Models\TipeKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    //
    public function home()
    {
        return view('user.home'); // Mengirim kedua variabel ke tampilan
    }

    public function provider()
    {
        $products = Produk::all();
        return view('user.provider', compact('products'));
    }

    public function rekomendasi()
    {
        $produk = Produk::all();
        $columns1 = Schema::getColumnListing('pembobotan');
        $excludeColumns1 = ['id', 'created_at', 'updated_at', 'users_id'];
        $BobotColumns = array_diff($columns1, $excludeColumns1);
        return view('user.rekomendasi', compact('produk', 'BobotColumns'));
    }
    public function showPerhitunganWP(Request $request)
    {
        $produks = $request->session()->get('produks', []);

        $excludeColumnsProduk = ['id', 'created_at', 'updated_at', 'nama'];
        $filteredProduks = [];

        // Filter kolom yang tidak diperlukan dari produk
        foreach ($produks as $produk) {
            $filteredProduk = new \stdClass();
            foreach ($produk->getAttributes() as $key => $value) {
                if (!in_array($key, $excludeColumnsProduk)) {
                    $filteredProduk->{$key} = $value;
                }
            }
            $filteredProduks[] = $filteredProduk;
        }

        // Mendapatkan kolom kriteria
        $columns = Schema::getColumnListing('table_product');
        $excludeColumns = ['id', 'created_at', 'updated_at', 'nama'];
        $kriteriaColumns = array_diff($columns, $excludeColumns);

        // Mendapatkan bobot untuk setiap kriteria
        $bobot = Bobot::where('users_id', Auth::id())->latest()->first();
        if (!$bobot) {
            return back()->withErrors(['error' => 'Bobot tidak ditemukan untuk pengguna saat ini.']);
        }

        $columns1 = Schema::getColumnListing('pembobotan');
        $excludeColumns1 = ['id', 'created_at', 'updated_at', 'users_id'];
        $BobotColumns = array_diff($columns1, $excludeColumns1);

        $sumBobot = 0;

        // Menghitung jumlah bobot
        foreach ($BobotColumns as $bobot1) {
            $sumBobot += $bobot->$bobot1;
        }

        $normalizedWeights = [];
        // Menormalkan bobot
        foreach ($BobotColumns as $bobot2) {
            $nilaiBobot = $bobot->$bobot2;
            if ($sumBobot != 0) {
                $normalizedWeights[$bobot1] = $nilaiBobot / $sumBobot;
            } else {
                $normalizedWeights[$bobot1] = 0;
            }
            $hasilNormalWeights[] = $normalizedWeights[$bobot1];
        }

        $S = [];
        $index = 0; // Indeks untuk mengakses $hasilNormalWeights

        // Menghitung vektor S
        foreach ($filteredProduks as $item) {
            $Si = 1;

            // Reset indeks untuk setiap produk
            $index = 0;

            foreach ($kriteriaColumns as $kriteria) {
                // Ambil bobot dari $hasilNormalWeights sesuai dengan indeks saat ini
                $nilaiBobot = isset($hasilNormalWeights[$index]) ? $hasilNormalWeights[$index] : 1;

                $nilaiProduk = $item->$kriteria;

                $tipeKriteria = TipeKriteria::where('nama', $kriteria)->first();

                if ($tipeKriteria && $tipeKriteria->tipe == 'Cost') {
                    // Menghitung untuk tipe Cost
                    $Si *= pow($nilaiProduk, -$nilaiBobot);
                } else {
                    // Menghitung untuk tipe Benefit
                    $Si *= pow($nilaiProduk, $nilaiBobot);
                }
                // Pindah ke indeks berikutnya di $hasilNormalWeights
                $index++;
            }

            $S[] = $Si;
        }

        $totalS = array_sum($S);

        // Menghitung vektor V
        $V = [];
        foreach ($S as $Si) {
            $V[] = $Si / $totalS;
        }

        $hasilWP = [];
        foreach ($produks as $index => $item) {
            $hasilWP[] = [
                'nama' => $item->nama,
                'nilai' => $V[$index] ?? 0,
            ];
        }

        // Mengurutkan hasil berdasarkan vektor V
        usort($hasilWP, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        // Menambahkan peringkat ke hasil
        foreach ($hasilWP as $index => $hasil) {
            $hasilWP[$index]['rank'] = $index + 1;
        }

        return view('user.rekomendasi', compact('hasilWP', 'BobotColumns', 'hasilNormalWeights', 'S', 'V', 'produks'));
    }

    public function addProduk(Request $request)
    {
        // Validasi input
        $request->validate([
            'produk' => 'required|exists:table_product,id' // Perhatikan penggunaan exists dengan benar
        ]);

        // Ambil produk dari database berdasarkan id
        $produk = Produk::find($request->produk);

        // Ambil daftar produk dari session (jika ada)
        $produks = $request->session()->get('produks', []);

        // Tambahkan produk baru ke dalam session menggunakan push
        $produks[] = $produk;

        // Simpan kembali ke session
        $request->session()->put('produks', $produks);

        // Redirect kembali ke halaman rekomendasi
        return redirect()->route('user.rekomendasi');
    }

    public function deleteProduk(Request $request, $produkID)
    {
        // Ambil daftar produk dari session
        $produks = $request->session()->get('produks', []);

        // Cari index produk berdasarkan ID
        foreach ($produks as $index => $produk) {
            if ($produk->id == $produkID) {
                // Hapus produk dari array
                unset($produks[$index]);
                break;
            }
        }

        // Reindex array dan simpan kembali ke session
        $produks = array_values($produks);
        $request->session()->put('produks', $produks);

        // Redirect kembali ke halaman rekomendasi
        return redirect()->route('user.rekomendasi');
    }


    public function addData(Request $request)
    {

        // Mendapatkan kolom dari tabel 'pembobotan'
        $column = Schema::getColumnListing('pembobotan');
        $excludeColumns = ['id', 'created_at', 'updated_at', 'users_id'];
        $filteredColumns = array_diff($column, $excludeColumns);
        $columnBobot = count($filteredColumns);

        // Validasi input untuk w1 hingga wN
        try {
            for ($i = 1; $i <= $columnBobot; $i++) {
                $request->validate([
                    "w$i" => 'required|numeric',
                ]);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }

        // Siapkan data untuk disimpan
        $data = [
            'users_id' => Auth::id(),
            'created_at' => now(),
        ];

        for ($i = 1; $i <= $columnBobot; $i++) {
            $data["w$i"] = $request->input("w$i");
        }


        // Simpan data ke tabel pembobotan
        try {
            Bobot::create($data);
        } catch (\Exception $e) {
        }

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
