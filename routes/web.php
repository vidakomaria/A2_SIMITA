<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\BarangPemilikController;
use App\Http\Controllers\RekapBarangController;
use App\Http\Controllers\RekapPenjualanController;
use App\Http\Controllers\ForecastingController;



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

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/' , function (){
   return view('login.index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//KARYAWAN
Route::group(['middleware'=>['auth', 'checkUser:karyawan']], function (){
    Route::get('/admin', function (){
        return view('Home.index') ;
    });
    //data barang
    Route::resource('/admin/barang', DataBarangController::class);

    //penjualan
    Route::get('admin/penjualan', [PenjualanController::class, 'index']);
    Route::get('admin/transaksi', [TransaksiController::class, 'index']);

    //cetak
    Route::get('admin/penjualan/nota/{id_penjualan}', [PenjualanController::class, 'nota']);

    //rekap
    Route::get('admin/rekap/barang', [RekapBarangController::class, 'index']);
//    Route::get('admin/rekap/barang/rekap', [RekapBarangController::class, 'rekap']);
    Route::get('admin/rekap/barang/cetak/{tglAwal}/{tglAkhir}', [RekapBarangController::class, 'cetak']);

    Route::get('admin/rekap/penjualan', [RekapPenjualanController::class, 'index']);
    Route::get('admin/rekap/penjualan/detail/{id_penjualan}', [RekapPenjualanController::class, 'detail']);
    Route::get('admin/rekap/penjualan/cetak/{tglAwal}/{tglAkhir}', [RekapPenjualanController::class, 'cetak']);

    //prediksi
    Route::get('admin/prediksi', [ForecastingController::class, 'index']);
    Route::get('admin/prediksi/chekForecast', [ForecastingController::class, 'checkForecast']);
});

//PEMILIK
Route::group(['middleware'=>['auth', 'checkUser:pemilik']], function (){
    Route::get('/pemilik', function (){
        return view('Home.index');});

    //barang
    Route::resource('/pemilik/barang', DataBarangController::class);

    //karyawan
    Route::resource('/pemilik/karyawan', KaryawanController::class);

    //rekap barang
    Route::get('/pemilik/rekap/barang', [RekapBarangController::class, 'index']);

    //rekap penjualan
    Route::get('/pemilik/rekap/penjualan', [RekapPenjualanController::class, 'index']);
    Route::get('/pemilik/rekap/penjualan/detail/{id_penjualan}', [RekapPenjualanController::class, 'detail']);

    //cetak
    Route::get('/pemilik/rekap/barang/cetak/{tglAwal}/{tglAkhir}', [RekapBarangController::class, 'cetak']);
    Route::get('/pemilik/penjualan/nota/{id_penjualan}', [PenjualanController::class, 'nota']);
    Route::get('/pemilik/rekap/penjualan/cetak/{tglAwal}/{tglAkhir}', [RekapPenjualanController::class, 'cetak']);

    //prediksi
    Route::get('/pemilik/prediksi',[ForecastingController::class, 'index']);
    Route::get('/pemilik/prediksi/chekForecast', [ForecastingController::class, 'checkForecast']);
});
