<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Satu route saja untuk landing page. Kalkulator harga ditangani sepenuhnya
| di sisi client (Alpine.js) — tidak perlu endpoint API terpisah karena
| logikanya sederhana (harga per kg x berat). Jika nanti daftar layanan
| ingin dikelola dari database/admin, tinggal ganti data statis di
| LandingController@index dengan query ke model Service.
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
