<!-- routes\web.php -->

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PegawaiController;

Route::get('/', [PegawaiController::class, 'index']);

Route::resource('pegawais', PegawaiController::class);

Auth::routes();
