<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPesananController;
use App\Http\Controllers\DashboardProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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

//login
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'loginRequest')->name('loginRequest');

});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register');
    Route::post('/register', 'registerRequest')->name('registerRequest');
});

Route::group(['middleware' => 'web'], function () {
    Route::controller(ShopController::class)->group(function () {
        Route::get('/', 'home')->name('home');
    });
});



//dashboard
Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'halamanUtama')->name('dashboard.halaman-utama');
});

Route::controller(DashboardProdukController::class)->group(function () {
    Route::get('/dashboard/produk', 'dashboardProduk')->name('produk.dashboard-produk');
});
Route::get('dashboard/produk/formtambah', [DashboardProdukController::class, 'formTambah'])
    ->name('dashboard.produk.formTambah');
Route::post('dashboard/produk/tambah', [DashboardProdukController::class, 'tambah'])
    ->name('dashboard.produk.tambah');
Route::post('dashboard/produk/delete', [DashboardProdukController::class, 'delete'])
    ->name('dashboard.produk.delete');

Route::controller(DashboardPesananController::class)->group(function () {
    Route::get('/dashboard/pesanan', 'dashboardPesanan')->name('pesanan.dashboard-pesanan');
});
Route::get('dashboard/pesanan/formtambah', [DashboardPesananController::class, 'formTambah'])
    ->name('dashboard.pesanan.formTambah');
Route::post('dashboard/pesanan/tambah', [DashboardPesananController::class, 'tambah'])
    ->name('dashboard.pesanan.tambah');
Route::post('dashboard/pesanan/delete', [DashboardPesananController::class, 'delete'])
    ->name('dashboard.pesanan.delete');


Route::get('dashboardpembeli', [PembeliController::class, 'halamanPembeli'])
    ->name('dashboard.pembeli.halamanPembeli');
Route::get('dashboard/pembeli/formtambah', [PembeliController::class, 'formTambah'])
    ->name('dashboard.pembeli.formTambah');
Route::post('dashboard/pembeli/tambah', [PembeliController::class, 'tambah'])
    ->name('dashboard.pembeli.tambah');



//shop
Route::controller(ShopController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});

Route::controller(KeranjangController::class)->group(function () {
    Route::get('/keranjang', 'keranjang')->name('keranjang');
});

Route::controller(PesananController::class)->group(function () {
    Route::get('/pesanan', 'pesanan')->name('pesanan');
});

Route::controller(PembayaranController::class)->group(function () {
    Route::get('/pembayaran', 'pembayaran')->name('pembayaran');
});





















Route::get('dashboard/barang/tambah', [BarangController::class, 'formTambah'])
    ->name('dashboard.barang.form-tambah');
Route::post('dashboard/barang/tambah', [BarangController::class, 'tambah'])
    ->name('dashboard.barang.tambah');
