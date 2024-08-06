<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Pegawai\PegawaiCreate;
use App\Livewire\Admin\Pegawai\PegawaiList;
use App\Livewire\Dahsboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Livewire\Admin\DataPeminjaman;
use App\Livewire\Admin\Laporan;
use App\Livewire\Admin\PeminjamanSaya;
use App\Livewire\Admin\PinjamRuangan;
use App\Livewire\Admin\PinjamRuanganBook;
use App\Livewire\Admin\BerandaAdmin;
use App\Livewire\Admin\Pegawai\PegawaiUpdate;
use App\Livewire\Admin\Pengguna\PenggunaCreate;
use App\Livewire\Admin\Pengguna\PenggunaList;
use App\Livewire\Admin\Pengguna\PenggunaUpdate;
use App\Livewire\Admin\AnnouncementManager;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Livewire\User\EditPeminjaman;
use App\Livewire\Admin\Ruangan\DataRuangan as RuanganDataRuangan;
use App\Livewire\Admin\Ruangan\RuanganCreate;
use App\Livewire\Admin\AnnouncementUpdate;
use App\Livewire\Admin\KontakMessages;
use App\Livewire\Admin\PinjamRuanganDetail;
use App\Livewire\Admin\Ruangan\EditRuang;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
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

Route::get('/ruangan', function () {
    return view('pages/ruangan');
})->middleware(['auth', 'verified']);

Route::get('/contact', function () {
    return view('pages/contact');
});

Route::get('/contact-messages', KontakMessages::class)->name('admin.contact-messages');


Route::get('home', Dahsboard::class)->middleware(['auth', 'role_or_permission:admin|user']);
Route::get('/beranda', BerandaAdmin::class)->middleware(['auth', 'role_or_permission:admin|view_beranda']);

//ruangan
Route::get('/dataruangan', RuanganDataRuangan::class)->middleware(['auth', 'role_or_permission:admin|view_dataruangan']);
Route::get('/ruangancreate', RuanganCreate::class);
Route::get('/ruangan/{id}/edit', EditRuang::class);

Route::get('/check-nip/{nip}', [RegisteredUserController::class, 'checkNip'])->name('check.nip');


Route::get('/pengumuman-manager', AnnouncementManager::class);
Route::get('/pengumuman-update/{id}', AnnouncementUpdate::class);
Route::get('/pengumumans', [AnnouncementController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{id}', [AnnouncementController::class, 'show'])->name('pengumuman.show');
Route::get('/pengumuman', function () {
    return view('pages.pengumuman');
})->name('pengumuman.index');

//pengguna
Route::get('/datapengguna', PenggunaList::class)->middleware(['auth', 'role_or_permission:admin|view_datapengguna']);
Route::get('/datapenggunacreate', PenggunaCreate::class);
Route::get('pengguna/{id}/update', PenggunaUpdate::class);

Route::get('/datapeminjaman', DataPeminjaman::class);
Route::get('/peminjamansaya', PeminjamanSaya::class);
Route::get('/peminjamansaya/{id}/edit', EditPeminjaman::class);
Route::get('/laporan', Laporan::class);
Route::get('/peggunaedit', PenggunaUpdate::class);
Route::get('pinjam-ruangan', PinjamRuangan::class);
Route::get('data-ruangan-pinjam', PinjamRuanganBook::class);
Route::get('pinjam-ruangan/{id}', PinjamRuanganBook::class)->name('pinjam-ruangan');
Route::get('pinjam-ruangan/{id}/detail', PinjamRuanganDetail::class)->name('pinjam-ruangan.detail');
Route::get('pegawai-create', PegawaiCreate::class);
Route::get('pegawai', PegawaiList::class);
Route::get('pegawai/{id}/update', PegawaiUpdate::class);
Route::get('/check-nip/{nip}', [RegisteredUserController::class, 'checkNip'])->name('check.nip');

Route::get('/gedung', function () {
    return view('pages/gedung');
});

Route::get('/ruangan-detail/{id}', [RoomController::class, 'show'])->name('ruangan.detail');

Route::get('/dashboard', function () {
    return view('beranda');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/ruangan', [RoomController::class, 'index'])->name('rooms.index');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verify-email');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

require __DIR__ . '/auth.php';
