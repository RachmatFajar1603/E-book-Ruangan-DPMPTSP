<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Dahsboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Livewire\Admin\DataPengguna;
use App\Livewire\Admin\DataRuangan;
use App\Livewire\Admin\DataPenggunaCreate;
use App\Livewire\Admin\DataPeminjaman;
use App\Livewire\Admin\Laporan;
use App\Livewire\Admin\PeminjamanSaya;
use App\Livewire\Admin\PinjamRuangan;
use App\Livewire\Admin\PinjamRuanganBook;
use App\Livewire\Admin\BerandaAdmin;

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


Route::get('home', Dahsboard::class)->middleware(['auth', 'verified', 'role_or_permission:admin|user']);
Route::get('/beranda', BerandaAdmin::class)->middleware(['auth', 'verified', 'role_or_permission:admin|view_beranda']);
Route::get('/dataruangan', DataRuangan::class)->middleware(['auth', 'verified', 'role_or_permission:admin|view_dataruangan']);
Route::get('/datapengguna', DataPengguna::class)->middleware(['auth', 'verified', 'role_or_permission:admin|view_datapengguna']);
Route::get('/datapenggunacreate', DataPenggunaCreate::class);
Route::get('/datapeminjaman', DataPeminjaman::class);
Route::get('/peminjamansaya', PeminjamanSaya::class);
Route::get('/laporan', Laporan::class);
Route::get('pinjam-ruangan', PinjamRuangan::class);
Route::get('data-ruangan-pinjam', PinjamRuanganBook::class);


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
