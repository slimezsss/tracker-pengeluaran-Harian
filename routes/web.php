<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengeluaranController;

Route::get('/', fn() => redirect()->route('pengeluaran.index'));

Route::resource('pengeluaran', PengeluaranController::class)
     ->except(['show']);  
