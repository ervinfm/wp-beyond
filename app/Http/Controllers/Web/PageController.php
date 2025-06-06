<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Inertia\Inertia;

class PageController extends Controller
{
    /**
     * Menampilkan halaman "Tentang Kami".
     *
     * @return \Inertia\Response
     */
    public function about()
    {
        // Method ini hanya me-render halaman Vue statis.
        // Jika ada data yang perlu ditampilkan (misal: daftar tim dari database),
        // Anda bisa mengambilnya di sini dan mengirimkannya sebagai props.
        return Inertia::render('Web/About');
    }

    /**
     * Menampilkan halaman "Kontak Kami".
     *
     * @return \Inertia\Response
     */
    public function contact()
    {
        // Sama seperti 'about', method ini me-render halaman kontak.
        // Anda bisa mengirimkan data kontak perusahaan (alamat, email, telp) dari database
        // dan menampilkannya di samping form kontak.
        return Inertia::render('Web/Contact');
    }

    /**
     * Menyimpan data dari form kontak dan mengirim email.
     *
     * @param  \App\Http\Requests\Web\StoreContactRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:20',
        ]);

        // 2. Simpan ke Database
        $message = ContactMessage::create($validatedData);

        // 3. (Sangat Direkomendasikan) Kirim Notifikasi Email
        // Kirim notifikasi ke admin
        // Mail::to('admin@perusahaananda.com')->send(new NewContactMessage($message));

        // Kirim email konfirmasi ke pengguna
        // Mail::to($message->email)->send(new ContactFormConfirmation($message));
        
        // 4. Kirim Respon Sukses ke Frontend
        return back()->with('success', 'Pesan Anda telah berhasil terkirim! Kami akan segera merespons Anda.');
    }
}