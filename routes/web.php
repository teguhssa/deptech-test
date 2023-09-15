<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [AuthController::class, "login"])->name("login");
Route::post("proses-login", [AuthController::class, "proses_login"])->name("proses-login");
Route::get("logout", [AuthController::class, "logout"])->name("logout");

Route::group(["middleware" => ["auth"]], function() {
    Route::get("dashboard", [DashboardController::class, "index"])->name("dashboard");
    Route::get("profile", [ProfileController::class, "index"])->name("profile");
    Route::get("profile/edit/{id}", [ProfileController::class, "edit"])->name("profile.edit");
    Route::put("profile/update/{id}", [ProfileController::class, "update"])->name("profile.update");

    Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('pegawai/add', [PegawaiController::class, 'create'])->name('pegawai.add');
    Route::post('pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('pegawai/update/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::get('pegawai/delete/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.delete');

    Route::get('cuti', [CutiController::class, 'index'])->name('cuti');
    Route::get('cuti/add', [CutiController::class, 'create'])->name('cuti.add');
    Route::post('cuti/store', [CutiController::class, 'store'])->name('cuti.store');
    Route::get('cuti/edit/{id}', [CutiController::class, 'edit'])->name('cuti.edit');
    Route::put('cuti/update/{id}', [CutiController::class, 'update'])->name('cuti.update');
    Route::get('cuti/delete/{id}', [CutiController::class, 'destroy'])->name('cuti.delete');
});