<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    // INDEX: tampilkan semua data + ringkasan
    public function index(Request $request)
    {
        // Ambil data pengeluaran dari DB (GET data tabel koneksi database)
        $query = Pengeluaran::with('kategori')
                    ->orderByDesc('tanggal')
                    ->orderByDesc('id');

        // Filter bulan 
        $bulan = $request->get('bulan', now()->format('Y-m'));
        [$tahun, $bln] = explode('-', $bulan);
        $query->whereYear('tanggal', $tahun)->whereMonth('tanggal', $bln);

        $pengeluarans    = $query->get();
        $totalBulanIni   = Pengeluaran::bulanIni()->sum('jumlah');
        $totalHariIni    = Pengeluaran::hariIni()->sum('jumlah');
        $kategoris       = Kategori::all();

        return view('pengeluaran.index', compact(
            'pengeluarans', 'totalBulanIni', 'totalHariIni',
            'kategoris', 'bulan'
        ));
    }

    // CREATE: form tambah
    public function create()
    {
        $kategoris = Kategori::all();
        return view('pengeluaran.create', compact('kategoris'));
    }

    // simpan ke DB ─
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul'       => 'required|string|max:200',
            'jumlah'      => 'required|numeric|min:1',
            'tanggal'     => 'required|date',
            'catatan'     => 'nullable|string',
        ]);

        Pengeluaran::create($request->all());

        return redirect()->route('pengeluaran.index')
                         ->with('success', 'Pengeluaran berhasil ditambahkan.');
    }

    // EDIT: form edit
    public function edit(Pengeluaran $pengeluaran)
    {
        $kategoris = Kategori::all();
        return view('pengeluaran.edit', compact('pengeluaran', 'kategoris'));
    }

    // UPDATE: simpan perubahan 
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul'       => 'required|string|max:200',
            'jumlah'      => 'required|numeric|min:1',
            'tanggal'     => 'required|date',
            'catatan'     => 'nullable|string',
        ]);

        $pengeluaran->update($request->all());

        return redirect()->route('pengeluaran.index')
                         ->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    // hapus dari DB 
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('pengeluaran.index')
                         ->with('success', 'Pengeluaran berhasil dihapus.');
    }
}
