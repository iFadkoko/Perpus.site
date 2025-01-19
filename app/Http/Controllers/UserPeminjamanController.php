<?php
    namespace App\Http\Controllers\User;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserPeminjamanController extends Controller
{
    public function requestPeminjaman(Request $request)
    {
        $buku = Buku::findOrFail($request->buku_id);
        $user = User::findOrFail($request->user_id);

        // Cek apakah user sudah memiliki request untuk buku yang sama
        $existingRequest = Peminjaman::where('user_id', $user->id)
            ->where('buku_id', $buku->id)
            ->whereIn('status', ['pending', 'approved'])
            ->first();

        if ($existingRequest) {
            return redirect()->back()->with('error', 'Anda sudah memiliki permintaan atau peminjaman aktif untuk buku ini.');
        }

        // Buat request peminjaman
        Peminjaman::create([
            'user_id' => $user->id,
            'buku_id' => $buku->id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Permintaan peminjaman berhasil dibuat. Tunggu persetujuan admin.');
    }
}


