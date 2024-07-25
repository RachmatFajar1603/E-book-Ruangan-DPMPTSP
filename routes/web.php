<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Dahsboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Livewire\Admin\DataPengguna;
use App\Livewire\Admin\DataRuangan;
use App\Livewire\Admin\DataPenggunaCreate;

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

Route::get('/', function () {
    return view('pages/welcome');
});

Route::get('/contact', function () {
    return view('pages/contact');
});

Route::get('home', Dahsboard::class);

Route::get('/dataruangan', DataRuangan::class);

Route::get('/datapengguna', DataPengguna::class);
Route::get('/datapenggunacreate', DataPenggunaCreate::class);

Route::get('/gedung', function () {
    return view('pages/gedung');
});

Route::get('/ruangan-detail', function () {
    return view('pages/ruangan-detail');
});

Route::get('/pengumuman', function () {
    return view('pages/pengumuman');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/ruangan', [RoomController::class, 'index'])->name('rooms.index');

require __DIR__.'/auth.php';
