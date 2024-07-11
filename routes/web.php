<?php
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\JurusanFakultasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\EskulController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});
// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Ubah dari GET menjadi PATCH
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/index', function () {
        return view('index');
    })->name('index');
});

Route::resource('dosens', DosenController::class);
Route::resource('eskuls', EskulController::class);
Route::resource('organisations', OrganisasiController::class);
Route::resource('jurusan_fakultas', JurusanFakultasController::class);
Route::resource('mahasiswas', MahasiswaController::class);
Route::resource('data', DataController::class);


require __DIR__.'/auth.php';
