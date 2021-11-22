<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\KategoriPengumumanController;
use App\Http\Controllers\KategoriAkademikController;
use App\Http\Controllers\Auth\RegisterController;

// route view dosen
Route::get('/dosen', [DosenController::class, 'index'])->name('dosen');
Route::get('/dosen/detail/{id_dosen}', [DosenController::class, 'detail']);
Route::get('/dosen/add', [DosenController::class, 'add']);
Route::post('/dosen/insert', [DosenController::class, 'insert']);
Route::get('/dosen/edit/{id_dosen}', [DosenController::class, 'edit']);
Route::post('/dosen/update/{id_dosen}', [DosenController::class, 'update']);
Route::get('/dosen/delete/{id_dosen}', [DosenController::class, 'delete']);

// route pengumuman
Route::get('/data-pengumuman', [PengumumanController::class, 'index'])->name('data-pengumuman');
Route::get('/detail-pengumuman/show/{id}', [PengumumanController::class, 'show'])->name('detail-pengumuman');
Route::get('/tambah-pengumuman/create', [PengumumanController::class, 'create'])->name('tambah-pengumuman');
Route::post('/insert-pengumuman/store', [PengumumanController::class, 'store'])->name('insert-pengumuman');
Route::get('/edit-pengumuman/edit/{id}', [PengumumanController::class, 'edit'])->name('edit-pengumuman');
Route::post('/update-pengumuman/update/{id}', [PengumumanController::class, 'update'])->name('update-pengumuman');
Route::get('/hapus-pengumuman/destroy/{id}', [PengumumanController::class, 'destroy'])->name('hapus-pengumuman');

// Route Kegiatan
Route::get('/data-kegiatan', [KegiatanController::class, 'index'])->name('data-kegiatan');
Route::get('/detail-kegiatan/show/{id}', [KegiatanController::class, 'show'])->name('detail-kegiatan');
Route::get('/tambah-kegiatan/create', [KegiatanController::class, 'create'])->name('tambah-kegiatan');
Route::post('/insert-kegiatan/store', [KegiatanController::class, 'store'])->name('insert-kegiatan');
Route::get('/edit-kegiatan/edit/{id}', [KegiatanController::class, 'edit'])->name('edit-kegiatan');
Route::post('/update-kegiatan/update/{id}', [KegiatanController::class, 'update'])->name('update-kegiatan');
Route::get('/hapus-kegiatan/destroy/{id}', [KegiatanController::class, 'destroy'])->name('hapus-kegiatan');

// Route Visi Misi
Route::get('/data-visimisi', [VisiMisiController::class, 'index'])->name('data-visimisi');
// Route Visi
Route::get('/detail-visi/showVisi/{id}', [VisiMisiController::class, 'showVisi'])->name('detail-visi');
Route::get('/edit-visi/editVisi/{id}', [VisiMisiController::class, 'editVisi'])->name('edit-visi');
Route::post('/update-visi/updateVisi/{id}', [VisiMisiController::class, 'updateVisi'])->name('update-visi');
// Route Misi
Route::get('/detail-misi/showMisi/{id}', [VisiMisiController::class, 'showMisi'])->name('detail-misi');
Route::get('/tambah-misi/createMisi', [VisiMisiController::class, 'createMisi'])->name('tambah-misi');
Route::post('/insert-misi/storeMisi', [VisiMisiController::class, 'storeMisi'])->name('insert-misi');
Route::get('/edit-misi/editMisi/{id}', [VisiMisiController::class, 'editMisi'])->name('edit-misi');
Route::post('/update-misi/updateMisi/{id}', [VisiMisiController::class, 'updateMisi'])->name('update-misi');
Route::get('/hapus-misi/destroyMisi/{id}', [VisiMisiController::class, 'destroyMisi'])->name('hapus-misi');

// Route Akademik
Route::get('/data-akademik', [AkademikController::class, 'index'])->name('data-akademik');
Route::get('/detail-akademik/show/{id}', [AkademikController::class, 'show'])->name('detail-akademik');
Route::get('/tambah-akademik/create', [AkademikController::class, 'create'])->name('tambah-akademik');
Route::post('/insert-akademik/store', [AkademikController::class, 'store'])->name('insert-akademik');
Route::get('/edit-akademik/edit/{id}', [AkademikController::class, 'edit'])->name('edit-akademik');
Route::post('/update-akademik/update/{id}', [AkademikController::class, 'update'])->name('update-akademik');
Route::get('/hapus-akademik/destroy/{id}', [AkademikController::class, 'destroy'])->name('hapus-akademik');

// Route::get('/', function () {
//     return view('v_admin.v_berandaAdmin');
// });
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('beranda');
// Route::post('/register', [RegisterController::class, 'register'])->name('login');

// Route Kategori Kegiatan
Route::get('/data-kategorikegiatan', [KategoriKegiatanController::class, 'index'])->name('data-kategorikegiatan');
Route::get('/tambah-kategorikegiatan/create', [KategoriKegiatanController::class, 'create'])->name('tambah-kategorikegiatan');
Route::post('/insert-kategorikegiatan/store', [KategoriKegiatanController::class, 'store'])->name('insert-kategorikegiatan');
Route::get('/hapus-kategorikegiatan/destroy/{id}', [KategoriKegiatanController::class, 'destroy'])->name('hapus-kategorikegiatan');

// Route Kategori Pengumuman
Route::get('/data-kategoripengumuman', [KategoriPengumumanController::class, 'index'])->name('data-kategoripengumuman');
Route::get('/tambah-kategoripengumuman/create', [KategoriPengumumanController::class, 'create'])->name('tambah-kategoripengumuman');
Route::post('/insert-kategoripengumuman/store', [KategoriPengumumanController::class, 'store'])->name('insert-kategoripengumuman');
Route::get('/hapus-kategoripengumuman/destroy/{id}', [KategoriPengumumanController::class, 'destroy'])->name('hapus-kategoripengumuman');

// Route Kategori Akademik
Route::get('/data-kategoriakademik', [KategoriAkademikController::class, 'index'])->name('data-kategoriakademik');
Route::get('/tambah-kategoriakademik/create', [KategoriAkademikController::class, 'create'])->name('tambah-kategoriakademik');
Route::post('/insert-kategoriakademik/store', [KategoriAkademikController::class, 'store'])->name('insert-kategoriakademik');
Route::get('/hapus-kategoriakademik/destroy/{id}', [KategoriAkademikController::class, 'destroy'])->name('hapus-kategoriakademik');