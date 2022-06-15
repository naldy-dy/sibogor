<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubadminController;
use App\Http\Controllers\SubadminProfilController;
use App\Http\Controllers\SubadminKritikController;
use App\Http\Controllers\SubUserController;
use App\Http\Controllers\SubadminHistoryController;

use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KategoriController;

use App\Http\Controllers\AdminTransaksiController;
use App\Http\Controllers\AdminPenyewaanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminGedungController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminProfilController;
use App\Http\Controllers\AdminHistoryController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfilController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(AuthController::class)->group(function(){
        Route::get('login', 'Login')->name('login');
        Route::post('login', 'prosesLogin');
        Route::get('logout', 'Logout');

        Route::get('daftar', 'register');
        Route::post('daftar', 'prosesDaftar');
});

Route::controller(UserController::class)->group(function(){
        
        Route::post('cari','filter');
        Route::post('filter-kategori','filterKategori');
        Route::post('filter-harga','filterHarga');

        Route::get('gedung/{request}','kategori');
        Route::get('pemilik/{user}','pemilik');
        Route::get('/','index');
        Route::get('maps','maps');

        Route::get('kontak','kontak');
        Route::get('berita','berita');

        Route::get('berita/baca/{berita}','detailBerita');
        Route::get('detail/{gedung}','detail');
        Route::get('gedung/{gedung}/route','route');
        Route::post('kritik','storeKritik');

        Route::get('test-ajax','testAjax');
});



// Laravel 8x

// // auth controller -----------------------------------------------------------
// Route::get('login', [AuthController:: class, 'Login'])->name('login');
// Route::post('login', [AuthController:: class, 'prosesLogin']);
// Route::get('logout', [AuthController:: class, 'Logout']);

// Route::get('register', [AuthController:: class, 'register']);
// Route::post('register', [AuthController:: class, 'prosesDaftar']);



//  Route::post('cari', [UserController:: class, 'filter']);
//  Route::post('filter', [UserController:: class, 'filterHarga']);
//  Route::post('filter-kategori', [UserController:: class, 'filterKategori']);
 
//  Route::get('gedung/{request}', [UserController:: class, 'kategori']);
//  Route::get('pemilik/{user}', [UserController:: class, 'pemilik']);

//  Route::get('/', [UserController:: class, 'index']);
// Route::get('maps', [UserController:: class, 'maps']);

// Route::get('kontak', [UserController:: class, 'kontak']);
// Route::get('berita', [UserController:: class, 'berita']);
// Route::get('berita/baca/{berita}', [UserController:: class, 'detailBerita']);
// Route::get('detail/{gedung}', [UserController:: class, 'detail']);
// Route::post('kritik', [UserController:: class, 'storeKritik']);


// Route::get('generate/{penyewaan}', [UserController:: class, 'generate']);


// sub admin controller---------------------------------------------------------
Route::prefix('sub-admin')->middleware('auth:subadmin')->group(function(){
        // subadmin controller
        Route::get('beranda', [SubadminController:: class, 'beranda']);

        // gedung controller


        Route::get('gedung', [GedungController:: class, 'index']); 
        Route::get('gedung/table', [GedungController:: class, 'indexTable']); 
        Route::get('gedung/create', [GedungController:: class, 'create']);
        Route::post('gedung/create', [GedungController:: class, 'store']);
        Route::get('gedung/edit/{gedung}', [GedungController:: class, 'edit']);
        Route::put('gedung/update/{gedung}', [GedungController:: class, 'update']);
        Route::delete('gedung/{gedung}',[GedungController:: class,'destroy']);


        // kecamatan controller
        Route::get('kecamatan', [KecamatanController:: class, 'index']); 
        Route::get('kecamatan/create', [KecamatanController:: class, 'create']);
        Route::post('kecamatan/create', [KecamatanController:: class, 'store']);
        Route::get('kecamatan/edit/{kecamatan}', [KecamatanController:: class, 'edit']);
        Route::put('kecamatan/update/{kecamatan}', [KecamatanController:: class, 'update']);
        Route::delete('kecamatan/{kecamatan}',[KecamatanController:: class,'destroy']);

         // Kategori
        Route::get('kategori', [KategoriController:: class, 'index']); 
        Route::get('kategori/create', [KategoriController:: class, 'create']);
        Route::post('kategori/create', [KategoriController:: class, 'store']);
        Route::get('kategori/edit/{kategori}', [KategoriController:: class, 'edit']);
        Route::put('kategori/update/{kategori}', [KategoriController:: class, 'update']);
        Route::delete('kategori/{kategori}',[KategoriController:: class,'destroy']);

         // transaksi
        Route::get('transaksi', [TransaksiController:: class, 'index']); 
        Route::get('transaksi/create', [TransaksiController:: class, 'create']);
        Route::post('transaksi/create', [TransaksiController:: class, 'store']);
        Route::get('transaksi/edit/{transaksi}', [TransaksiController:: class, 'edit']);
        Route::put('transaksi/update/{transaksi}', [TransaksiController:: class, 'update']);
        Route::delete('transaksi/{transaksi}',[TransaksiController:: class,'destroy']);


         // transaksi
        Route::get('user/admin', [SubUserController:: class, 'penggunaAdmin']); 
        Route::get('user/user', [SubUserController:: class, 'penggunaUser']); 
        Route::get('user/all', [SubUserController:: class, 'penggunaAll']); 

        // history
        Route::get('history', [SubadminHistoryController:: class, 'index']);
        Route::delete('history/{penyewaan}', [SubadminHistoryController:: class, 'destroy']);

        // subadmin profil
        Route::get('profil', [SubadminProfilController:: class, 'index']);
        Route::put('profil/update/{user}', [SubadminProfilController:: class, 'update']);
        Route::put('profil/change-password/{user}', [SubadminProfilController:: class, 'change']);

        // kritik dan saran
        Route::get('kritik', [SubadminKritikController:: class, 'index']);


});



// ---------------------------------ADMIN---------------------------------------------------------------
Route::prefix('admin')->middleware('auth')->group(function(){
        
        Route::get('beranda', [AdminController:: class, 'beranda']);
        Route::get('gedung', [AdminGedungController:: class, 'index']);
        Route::get('gedung/create', [AdminGedungController:: class, 'create']);
        Route::post('gedung/create', [AdminGedungController:: class, 'store']);
        Route::get('gedung/detail/{gedung}', [AdminGedungController:: class, 'show']);
        Route::get('gedung/edit/{gedung}', [AdminGedungController:: class, 'edit']);
        Route::put('gedung/update/{gedung}', [AdminGedungController:: class, 'update']);
        Route::delete('gedung/delete/{gedung}',[AdminGedungController:: class,'destroy']);
        Route::delete('gedung/galeri/delete/{galeri}',[AdminGedungController:: class,'destroyGaleri']);


        Route::post('gedung/galeri/upload', [AdminGedungController:: class, 'galeri']);

        // admin transaksi
        Route::get('transaksi', [AdminTransaksiController:: class, 'index']);
        Route::get('transaksi/create', [AdminTransaksiController:: class, 'create']);
        Route::post('transaksi/create', [AdminTransaksiController:: class, 'store']);
        Route::get('transaksi/edit/{transaksi}', [AdminTransaksiController:: class, 'edit']);
        Route::put('transaksi/update/{admintranasksi}', [AdminTransaksiController:: class, 'update']);
        Route::delete('transaksi/delete/{admintranasksi}',[AdminTransaksiController:: class,'destroy']);

        // penyewaan controller
        Route::get('penyewaan', [AdminPenyewaanController:: class, 'index']);
        Route::put('penyewaan/status/{status}', [AdminPenyewaanController:: class, 'status']);
        Route::get('penyewaan/create', [AdminPenyewaanController:: class, 'create']);
        Route::post('penyewaan/create', [AdminPenyewaanController:: class, 'store']);
        Route::get('penyewaan/edit/{penyewaan}', [AdminPenyewaanController:: class, 'edit']);
        Route::put('penyewaan/update/{penyewaan}', [AdminPenyewaanController:: class, 'update']);
        Route::delete('penyewaan/delete/{penyewaan}',[AdminPenyewaanController:: class,'destroy']);


        // history
         Route::get('history', [AdminHistoryController:: class, 'index']);

        // Galeri Controller
        Route::get('galeri', [AdminGaleriController:: class, 'index']);
        Route::get('galeri/create', [AdminGaleriController:: class, 'create']);
        Route::post('galeri/create', [AdminGaleriController:: class, 'store']);
        Route::delete('galeri/{galeri}',[AdminGaleriController:: class,'destroy']);

        // profil controller
        Route::get('profil', [AdminProfilController:: class, 'index']);
        Route::put('profil/update/{user}', [AdminProfilController:: class, 'update']);
        Route::put('profil/change-password/{user}', [AdminProfilController:: class, 'change']);

        // profil controller
        Route::post('berita/create', [AdminProfilController:: class, 'storeBerita']);
         Route::delete('berita/delete/{berita}',[AdminProfilController:: class,'destroyBerita']);
         Route::put('berita/update/{berita}',[AdminProfilController:: class,'updateBerita']);
});
// open


// lock

Route::middleware('auth')->group(function(){
        // Boking controller------------------------
        Route::get('form-boking/{gedung}', [UserController:: class, 'form']); 
        Route::post('form-boking/biodata', [UserController:: class, 'formSewa']);
        Route::get('pembayaran', [UserController:: class, 'formPembayaran']);
        Route::get('user/history', [UserController:: class, 'history']);

         Route::get('user/profil', [UserProfilController:: class, 'index']);
        Route::put('user/profil/update/{user}', [UserProfilController:: class, 'update']);
        Route::put('user/profil/change-password/{user}', [UserProfilController:: class, 'change']);

        Route::get('beranda', [UserController:: class, 'beranda']);

        // pembayaran dalam user
        Route::get('pembayaran/bayar/{penyewa}', [UserController:: class, 'bayar']);
         Route::put('pembayaran/update/{penyewaan}', [UserController:: class, 'update']);
});


