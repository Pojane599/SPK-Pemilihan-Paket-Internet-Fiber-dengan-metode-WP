<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class MessageController extends Controller
{
    public function index($status)
    {
        $messages = Message::where('status', $status)->orderBy('waktu_kirim', 'desc')->get();
        $counts = DB::table('message')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
        return view('admin.pesan', compact('messages', 'status', 'counts'));
    }

    public function readMail($id_message, $previous_status)
    {
        // Mengambil pesan berdasarkan ID
        $message = Message::findOrFail($id_message);
        if ($previous_status === 'Belum Dibaca') {
            // Jika ya, ubah status pesan menjadi "Dibaca"
            $message->status = 'Dibaca';
            $message->save();
        }
        $message->save();
        $counts = DB::table('message')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
        // Tampilkan view untuk membaca email dan kirimkan data pesan
        return view('emails.read', compact('message', 'counts', 'previous_status'));
    }

    public function deleteSelected(Request $request)
    {
        $selectedMessages = $request->input('selected_messages', []);

        Log::info($selectedMessages);
        // Validasi bahwa ada pesan yang dipilih
        if (empty($selectedMessages)) {
            return redirect()->back()->with('error', 'Please select messages to delete.');
        }

        // Ubah status pesan yang dipilih menjadi "Hapus"
        Message::whereIn('id_message', $selectedMessages)->update(['status' => 'Hapus']);
        return redirect()->route('admin.pesan', 'Belum Dibaca')->with('success', 'Messages marked as deleted successfully');
    }

    public function updateStatus(Request $request, $id_message)
    {
        // Mengambil pesan berdasarkan ID
        $message = Message::findOrFail($id_message);
        // Mendapatkan status yang dipilih dari request
        $selectedStatuses = $request->input('status', []);

        // Mengubah status pesan sesuai dengan status yang dipilih
        if ($message->status === 'Selesai') {
            // Jika sudah "Selesai", cek apakah status baru adalah "Hapus"
            if (in_array('Hapus', $selectedStatuses)) {
                // Izinkan perubahan status menjadi "Hapus"
                $message->status = 'Hapus';
            } else {
                // Tolak perubahan status dan kembalikan pesan kesalahan
                return redirect()->back()->with('error', 'Pesan yang sudah Selesai hanya dapat dihapus.');
            }
        } else {
            // Jika belum "Selesai", izinkan perubahan status sesuai yang dipilih
            if (in_array('Diproses', $selectedStatuses)) {
                $message->status = 'Diproses';
            } elseif (in_array('Selesai', $selectedStatuses)) {
                $message->status = 'Selesai';
            } elseif (in_array('Pending', $selectedStatuses)) {
                $message->status = 'Pending';
            } elseif (in_array('Tindak Lanjut', $selectedStatuses)) {
                $message->status = 'Di Tindak Lanjuti';
            }
        }

        // Menyimpan perubahan status pesan
        $message->save();

        // Redirect kembali ke halaman pesan dengan pesan sukses
        return redirect()->route('admin.pesan', ['status' => $message->status])->with('success', 'Status pesan berhasil diperbarui.');
    }

    //===============================================================================
    //User Interface
    //===============================================================================

    public function Message()
    {
        return view('user.pesan');
    }

    public function sendMessage(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create([
            'waktu_kirim' => now(),
            'users_id' => Auth::id(),
            'subject' => $validatedData['subject'],
            'kategori' => $validatedData['kategori'],
            'pesan' => $validatedData['message'], // Ubah 'pesan' ke 'message'
            'status' => 'Belum Dibaca',
        ]);

        Alert::success('success', 'Pesan berhasil dikirim!');

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
