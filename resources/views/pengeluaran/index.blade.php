@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

{{-- Ringkasan --}}
<div style="display:grid; grid-template-columns: repeat(auto-fit,minmax(180px,1fr)); gap:12px; margin-bottom:24px">
    <div class="card">
        <div class="card-body">
            <p style="font-size:11px; font-weight:600; text-transform:uppercase; letter-spacing:.05em; color:#888; margin-bottom:4px">Total Bulan Ini</p>
            <p style="font-size:22px; font-weight:600; letter-spacing:-0.5px">Rp {{ number_format($totalBulanIni,0,',','.') }}</p>
            <p style="font-size:11px; color:#aaa; margin-top:2px">{{ now()->format('F Y') }}</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <p style="font-size:11px; font-weight:600; text-transform:uppercase; letter-spacing:.05em; color:#888; margin-bottom:4px">Hari Ini</p>
            <p style="font-size:22px; font-weight:600; letter-spacing:-0.5px">Rp {{ number_format($totalHariIni,0,',','.') }}</p>
            <p style="font-size:11px; color:#aaa; margin-top:2px">{{ now()->format('d F Y') }}</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <p style="font-size:11px; font-weight:600; text-transform:uppercase; letter-spacing:.05em; color:#888; margin-bottom:4px">Transaksi</p>
            <p style="font-size:22px; font-weight:600; letter-spacing:-0.5px">{{ $pengeluarans->count() }}</p>
            <p style="font-size:11px; color:#aaa; margin-top:2px">Data difilter</p>
        </div>
    </div>
</div>

{{-- Tabel Pengeluaran --}}
<div class="card">

    {{-- Header + Filter --}}
    <div style="display:flex; align-items:center; justify-content:space-between; padding:14px 20px; border-bottom:1px solid var(--border)">
        <p style="font-size:14px; font-weight:600">Pengeluaran</p>
        <form method="GET" action="{{ route('pengeluaran.index') }}" style="display:flex; gap:8px; align-items:center">
            <input type="month" name="bulan" value="{{ $bulan }}"
                   class="form-control" style="width:auto; font-size:13px; padding:5px 10px"
                   onchange="this.form.submit()">
            <select name="kategori_id" class="form-select" style="width:auto; font-size:13px; padding:5px 10px"
                    onchange="this.form.submit()">
                <option value="">Semua</option>
                @foreach($kategoris as $k)
                    <option value="{{ $k->id }}" {{ request('kategori_id')==$k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                @endforeach
            </select>
        </form>
    </div>

    {{-- Isi Tabel --}}
    @if($pengeluarans->isEmpty())
        <div style="padding:40px; text-align:center; color:#aaa">
            <p style="margin-bottom:12px">Belum ada data untuk filter ini.</p>
            <a href="{{ route('pengeluaran.create') }}" class="btn btn-primary btn-sm">Tambah Pengeluaran</a>
        </div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th style="text-align:right">Jumlah</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengeluarans as $p)
                <tr>
                    <td style="color:#888; white-space:nowrap; font-size:13px">{{ $p->tanggal->format('d M Y') }}</td>
                    <td>
                        <span style="font-weight:500">{{ $p->judul }}</span>
                        @if($p->catatan)
                            <br><span style="font-size:11px; color:#aaa">{{ $p->catatan }}</span>
                        @endif
                    </td>
                    <td><span class="badge">{{ $p->kategori->nama }}</span></td>
                    <td style="text-align:right; font-weight:600; white-space:nowrap">
                        Rp {{ number_format($p->jumlah,0,',','.') }}
                    </td>
                    <td style="text-align:center; white-space:nowrap">
                        <a href="{{ route('pengeluaran.edit', $p) }}" class="btn btn-outline btn-sm">Edit</a>
                        <form action="{{ route('pengeluaran.destroy', $p) }}" method="POST"
                              style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm" style="color:#dc2626; border:1px solid #fecaca; background:#fff">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="color:#888">Total {{ $pengeluarans->count() }} transaksi</td>
                    <td style="text-align:right; color:#2563eb">Rp {{ number_format($pengeluarans->sum('jumlah'),0,',','.') }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    @endif
</div>

@endsection
