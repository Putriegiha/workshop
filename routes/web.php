<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPemesananController;
use App\Http\Controllers\DashboardPemesananDetailController;
use App\Http\Controllers\DashboardProdukController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PemesananController;
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

Route::prefix('dashboard/produk')
    ->controller(DashboardProdukController::class)
    ->group(function () {
        Route::get('', 'dashboardProduk')->name('dashboard.produk.list');
        Route::get('formtambah', 'formTambah')->name('dashboard.produk.formTambah');
        Route::post('tambah', 'tambah')->name('dashboard.produk.tambah');
        Route::get('form-edit/{produk}', 'formEdit')
            ->withTrashed()
            ->name('dashboard.produk.form-edit');
        Route::put('edit/{produk}', 'edit')
            ->withTrashed()
            ->name('dashboard.produk.edit');
        Route::post('memulihkan/{produk}', 'memulihkan')
            ->withTrashed()
            ->name('dashboard.produk.memulihkan');
        Route::delete('hapus/{produk}', 'hapus')->name('dashboard.produk.hapus');
    });

Route::prefix('dashboard/pemesanan/{pemesanan}')
    ->controller(DashboardPemesananDetailController::class)
    ->group(function () {
        Route::get('', 'pemesananDetail')->name('dashboard.pemesanan.detail');
    });

Route::prefix('dashboard/pemesanan')
    ->controller(DashboardPemesananController::class)
    ->group(function () {
        Route::get('', 'dashboardPemesanan')->name('pemesanan.dashboard-pemesanan');
        Route::get('form-edit/{pemesanan}', 'formEdit')->name('dashboard.pemesanan.form-edit');
        Route::put('edit/{pemesanan}', 'edit')->name('dashboard.pemesanan.edit');
    });






//shop
Route::controller(ShopController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});

Route::controller(DetailProdukController::class)->group(function () {
    Route::get('/detailproduk', 'detailProduk')->name('detailProduk');
});

Route::prefix('/keranjang')
    ->controller(KeranjangController::class)
    ->group(function () {
        Route::get('', 'keranjang')->name('shop.keranjang');
        Route::get('form-edit/{keranjang}', 'formEdit')->name('shop.keranjnag.form-edit');
        Route::put('edit/{keranjang}', 'edit')->name('shop.keranjang.edit');
        Route::delete('/keranjnag/{keranjang}', 'hapus')->name('shop.keranjang.hapus');
    });

Route::prefix('/checkout')
    ->controller(CheckoutController::class)
    ->group(function () {
        Route::get('', 'checkout')->name('shop.checkout.halaman-checkout');
        Route::get('form-edit/{pemesanan}', 'formEdit')->name('shop.pemesanan.form-edit');
        Route::put('edit/{pemesanan}', 'edit')->name('shop.pemesanan.edit');
    });

Route::prefix('/pemesanan')
    ->controller(PemesananController::class)
    ->group(function () {
        Route::get('', 'pemesanan')->name('shop.pemesanan');
        Route::get('pemesanan/{pemesanan}', 'tampil')->name('shop.pemesanan.list-pemesanan');
        Route::put('edit/{pemesanan}', 'edit')->name('shop.pemesanan.edit');
    });

Route::prefix('/detailpemesanan')
    ->controller(PemesananController::class)
    ->group(function () {
        Route::get('', 'detailPemesanan')->name('shop.detail-pemesanan');
        Route::get('pemesanan/{pemesanan}', 'tampil')->name('shop.pemesanan.list-pemesanan');
        Route::put('edit/{pemesanan}', 'edit')->name('shop.pemesanan.edit');
    });
