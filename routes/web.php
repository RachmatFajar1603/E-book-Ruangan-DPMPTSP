<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Pegawai\PegawaiCreate;
use App\Livewire\Admin\Pegawai\PegawaiList;
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
use App\Livewire\Admin\Pegawai\PegawaiEdit;
use App\Livewire\Admin\Pegawai\PegawaiUpdate;
use App\Livewire\Admin\Pengguna\PenggunaCreate;
use App\Livewire\Admin\Pengguna\PenggunaList;
use App\Livewire\Admin\Pengguna\PenggunaUpdate;
use App\Livewire\Admin\AnnouncementManager;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
Route::get('/check-nip/{nip}', [RegisteredUserController::class, 'checkNip'])->name('check.nip');


Route::get('/pengumuman-manager', AnnouncementManager::class);
Route::get('/pengumumans', [AnnouncementController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{id}', [AnnouncementController::class, 'show'])->name('pengumuman.show');
Route::get('/pengumuman', function () {
    return view('pages.pengumuman');
})->name('pengumuman.index');

Route::get('/datapengguna', PenggunaList::class)->middleware(['auth', 'verified', 'role_or_permission:admin|view_datapengguna']);
Route::get('/datapenggunacreate', PenggunaCreate::class);
Route::get('pengguna/{id}/update', PenggunaUpdate::class);

Route::get('/datapeminjaman', DataPeminjaman::class);
Route::get('/peminjamansaya', PeminjamanSaya::class);
Route::get('/laporan', Laporan::class);
Route::get('/peggunaedit', PenggunaUpdate::class);
Route::get('pinjam-ruangan', PinjamRuangan::class);
Route::get('data-ruangan-pinjam', PinjamRuanganBook::class);
Route::get('pinjam-ruangan/{id}', PinjamRuanganBook::class)->name('pinjam-ruangan');
Route::get('pegawai-create', PegawaiCreate::class);
Route::get('pegawai', PegawaiList::class);
Route::get('pegawai/{id}/update', PegawaiUpdate::class);

Route::get('/gedung', function () {
    return view('pages/gedung');
});
Route::get('/ruangan-detail', function () {
    return view('pages/ruangan-detail');
});
Route::get('/dashboard', function () {
    return view('beranda');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/ruangan', [RoomController::class, 'index'])->name('rooms.index');

require __DIR__ . '/auth.php';
