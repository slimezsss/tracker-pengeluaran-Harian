@extends('layouts.app')
@section('title', 'Tambah Pengeluaran')

@section('content')

<div style="margin-bottom:16px">
    <a href="{{ route('pengeluaran.index') }}" style="font-size:13px; color:#888; text-decoration:none">← Kembali</a>
</div>

<div class="card" style="max-width:520px">
    <div style="padding:16px 20px; border-bottom:1px solid var(--border)">
        <p style="font-size:14px; font-weight:600">Tambah Pengeluaran</p>
    </div>
    <div class="card-body">
        <form action="{{ route('pengeluaran.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-select">
                        <option value="">— Pilih —</option>
                        @foreach($kategoris as $k)
                            <option value="{{ $k->id }}" {{ old('kategori_id')==$k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                    @error('kategori_id')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control"
                           value="{{ old('tanggal', today()->toDateString()) }}">
                    @error('tanggal')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Keterangan / Judul</label>
                <input type="text" name="judul" class="form-control"
                       placeholder="cth. Makan siang" value="{{ old('judul') }}">
                @error('judul')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Jumlah (Rp)</label>
                <input type="number" name="jumlah" class="form-control"
                       placeholder="0" min="1" value="{{ old('jumlah') }}">
                @error('jumlah')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Catatan <span style="font-weight:400; text-transform:none">(opsional)</span></label>
                <input type="text" name="catatan" class="form-control"
                       placeholder="Catatan singkat..." value="{{ old('catatan') }}">
            </div>

            <div style="display:flex; gap:8px; margin-top:4px">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('pengeluaran.index') }}" class="btn btn-outline">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
