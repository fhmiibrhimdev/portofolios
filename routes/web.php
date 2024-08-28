<?php

use App\Livewire\Welcome;
use App\Livewire\Control\User;
use App\Livewire\Example\Example;
use App\Livewire\Profile\Profile;
use App\Livewire\Dashboard\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Livewire\Module\Perkuliahan\Dosen;
use App\Http\Controllers\ProfileController;
use App\Livewire\Module\Perkuliahan\Catatan;
use App\Livewire\Module\Perkuliahan\Semester;
use App\Livewire\Module\Perkuliahan\MataKuliah;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Artikels\Artikels;
use App\Livewire\Module\Artikel\ArtikelView;
use App\Livewire\Module\Artikel\Kategori;
use App\Livewire\Module\Artikel\Postingan;
use App\Livewire\Module\Artikel\SubKategori;
use App\Livewire\Module\Perkuliahan\CatatanView;
use App\Livewire\Module\Perkuliahan\Cloud;
use App\Livewire\Module\Perkuliahan\Ppkp;
use App\Livewire\Module\Perkuliahan\PpkpPertanyaanJawaban;
use App\Livewire\Module\Perkuliahan\Tugas;

// Route::get('/', [AuthenticatedSessionController::class, 'create'])
//                 ->name('login');

// Route::post('/', [AuthenticatedSessionController::class, 'store']);

Route::get('/', Welcome::class);

Route::get('/articles', Artikels::class);
Route::get('/articles/{kategori?}', Artikels::class);
Route::get('/article/{slug}', ArtikelView::class);
Route::get('/lectures/{slug}', CatatanView::class);
Route::get('/lectures/ppkp/pertanyaan-jawaban', PpkpPertanyaanJawaban::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/profile', Profile::class);

    Route::post('/summernote/file/upload', [UploadController::class, 'uploadImageSummernote']);
    Route::post('/summernote/file/delete', [UploadController::class, 'deleteImageSummernote']);
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/module/artikel/kategori', Kategori::class);
    Route::get('/module/artikel/sub-kategori', SubKategori::class);
    Route::get('/module/artikel/postingan', Postingan::class);

    Route::get('/module/perkuliahan/semester', Semester::class);
    Route::get('/module/perkuliahan/dosen', Dosen::class);
    Route::get('/module/perkuliahan/mata-kuliah', MataKuliah::class);
    Route::get('/module/perkuliahan/catatan', Catatan::class);
    Route::get('/module/perkuliahan/tugas', Tugas::class);
    Route::get('/module/perkuliahan/cloud', Cloud::class);

    Route::get('/module/perkuliahan/ppkp', Ppkp::class);

    Route::get('/example', Example::class);
    Route::get('/control-user', User::class);
});

Route::group(['middleware' => ['auth', 'role:user']], function () {});

require __DIR__ . '/auth.php';
