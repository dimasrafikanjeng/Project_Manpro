<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Kelompok;

class AbsensiController extends Controller
{
    public function create()
    {
        $kelompok = Kelompok::with('mentor')->get();
        return view('pages.absensi.create', compact('kelompok'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_peserta' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'keterangan' => 'required|in:Hadir,Izin,Sakit,Alpa',
            'kelompok_id' => 'required|exists:kelompok,id',
        ]);

        $kelompok = Kelompok::findOrFail($request->kelompok_id);

        Absensi::create([
            'nama_peserta' => $request->nama_peserta,
            'nim' => $request->nim,
            'keterangan' => $request->keterangan,
            'kelompok_id' => $request->kelompok_id,
            'mentor_id' => $kelompok->mentor_id,
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil disimpan!');
    }
}
