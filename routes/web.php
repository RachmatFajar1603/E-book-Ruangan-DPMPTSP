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

// Routes yang tidak memerlukan autentikasi
Route::group([], function () {
    Route::get('/', function () {
        return view('pages/welcome');
    });

    Route::get('/ruangan', [RoomController::class, 'index'])->name('ruangan.index');

    Route::get('/pengumuman', function () {
        return view('pages.pengumuman');
    })->name('pengumuman.index');

    Route::get('/contact', function () {
        return view('pages/contact');
    });

    Route::get('/ruangan-detail/{id}', [RoomController::class, 'show'])->name('ruangan.detail');
    Route::get('/check-nip/{nip}', [RegisteredUserController::class, 'checkNip'])->name('check.nip');
});

// Routes yang memerlukan autentikasi dan verifikasi
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', Dahsboard::class);
    Route::get('/beranda', BerandaAdmin::class)->middleware('role_or_permission:superadmin|view_beranda')->name('dashboard');
    Route::get('/livewire/admin/beranda-admin', BerandaAdmin::class);
    
    // Ruangan routes
    Route::get('/dataruangan', RuanganDataRuangan::class)->middleware('role_or_permission:superadmin|view_dataruangan');
    Route::get('/dataruangan/create', RuanganCreate::class);
    Route::get('/dataruangan/{id}/edit', EditRuang::class);
    
    // Pengumuman routes
    Route::get('/pengumuman-manager', AnnouncementManager::class);
    Route::get('/pengumuman-update/{id}', AnnouncementUpdate::class);
    Route::get('/pengumumans', [AnnouncementController::class, 'index'])->name('pengumuman.index');
    Route::get('/pengumuman/{id}', [AnnouncementController::class, 'show'])->name('pengumuman.show');
    
    // Pengguna routes
    Route::get('/datapengguna', PenggunaList::class)->middleware('role_or_permission:superadmin|view_datapengguna');
    Route::get('/datapengguna/create', PenggunaCreate::class);
    Route::get('/datapengguna/{id}/update', PenggunaUpdate::class);
    
    // Peminjaman routes
    Route::get('/datapeminjaman', DataPeminjaman::class)->middleware('role_or_permission:superadmin|view_datapeminjaman');
    Route::get('/peminjamansaya', PeminjamanSaya::class)->middleware('role_or_permission:superadmin|view_peminjamansaya');
    Route::get('/peminjamansaya/{id}/edit', EditPeminjaman::class);
    Route::get('/laporan', Laporan::class)->middleware('role_or_permission:superadmin|view_laporan');
    Route::get('/peggunaedit', PenggunaUpdate::class);
    Route::get('pinjam-ruangan', PinjamRuangan::class);
    Route::get('data-ruangan-pinjam', PinjamRuanganBook::class);
    Route::get('pinjam-ruangan/{id}', PinjamRuanganBook::class)->name('pinjam-ruangan');
    Route::get('pinjam-ruangan/{id}/detail', PinjamRuanganDetail::class)->name('pinjam-ruangan.detail');
    
    // Pegawai routes
    Route::get('pegawai/create', PegawaiCreate::class);
    Route::get('pegawai', PegawaiList::class);
    Route::get('pegawai/{id}/update', PegawaiUpdate::class);
    
    // Other authenticated routes
    Route::get('/contact-messages', KontakMessages::class)->name('admin.contact-messages');
    Route::get('/gedung', function () {
        return view('pages/gedung');
    });
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

// Route untuk verifikasi email
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

// Include auth routes
require __DIR__ . '/auth.php';