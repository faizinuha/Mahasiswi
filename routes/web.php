<?php
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\JurusanFakultasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\dataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/index', function () {
        return view('index');
    })->name('index');
});

Route::resource('dosens', DosenController::class);
Route::resource('organisations', OrganisasiController::class);
Route::resource('jurusan_fakultas', JurusanFakultasController::class);
Route::resource('mahasiswas', MahasiswaController::class);
Route::resource('data', DataController::class);


require __DIR__.'/auth.php';
