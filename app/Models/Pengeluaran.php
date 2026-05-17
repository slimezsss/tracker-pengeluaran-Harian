<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table    = 'pengeluaran';
    protected $fillable = ['kategori_id', 'judul', 'jumlah', 'tanggal', 'catatan'];
    protected $casts    = ['tanggal' => 'date', 'jumlah' => 'decimal:2'];

    /*pengeluaran ini milik satu kategori*/
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /*hanya bulan & tahun ini */
    public function scopeBulanIni($q)
    {
        return $q->whereMonth('tanggal', now()->month)
                 ->whereYear('tanggal', now()->year);
    }

    /*hanya hari ini */
    public function scopeHariIni($q)
    {
        return $q->whereDate('tanggal', today());
    }
}
