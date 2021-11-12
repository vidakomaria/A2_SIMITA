<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BarangController;
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

Route::group(['middleware'=>['auth', 'checkUser:karyawan']], function (){
    Route::get('/admin', function (){
        return view('admin.home.index') ;
    });

    Route::resource('/admin/barang', BarangController::class);
});


Route::group(['middleware'=>['auth', 'checkUser:pemilik']], function (){
    Route::get('/pemilik', function (){
        return view('pemilik.home.index');});

    Route::resource('/pemilik/barang', BarangPemilikController::class);

//    Route::resource('/pemilik/karyawan', EmployeeController::class);

    Route::get('pemilik/karyawan', [KaryawanController::class, 'index']);

    Route::get('pemilik/karyawan/create', [KaryawanController::class, 'create']);
    Route::get('pemilik/karyawan/store', [KaryawanController::class, 'store']);

    Route::get('pemilik/karyawan/{id}/edit', [KaryawanController::class, 'edit']);
    Route::put('pemilik/karyawan/{id}', [KaryawanController::class, 'update']);

    Route::delete('pemilik/karyawan/{id}', [KaryawanController::class, 'delete']);
});

Route::get('admin/penjualan', [PenjualanController::class, 'index']);
Route::get('admin/transaksi', [TransaksiController::class, 'index']);
Route::get('admin/penjualan/nota/{id_penjualan}', [PenjualanController::class, 'nota']);

Route::get('admin/rekap/barang', [RekapBarangController::class, 'index']);
Route::get('admin/rekap/barang/rekap', [RekapBarangController::class, 'rekap']);
Route::get('admin/rekap/barang/print/{tglAwal}/{tglAkhir}', [RekapBarangController::class, 'print']);

Route::get('pemilik/rekap/barang', [RekapBarangController::class, 'pemilikIndex']);
Route::get('pemilik/rekap/barang/rekap', [RekapBarangController::class, 'pemilikRekap']);
Route::get('pemilik/rekap/barang/print/{tglAwal}/{tglAkhir}', [RekapBarangController::class, 'pemilikPrint']);

Route::get('admin/rekap/penjualan', [RekapPenjualanController::class, 'adminIndex']);
Route::get('admin/rekap/penjualan/rekap', [RekapPenjualanController::class, 'adminRekap']);
Route::get('admin/rekap/penjualan/detail/{id_penjualan}', [RekapPenjualanController::class, 'adminDetail']);
Route::get('admin/rekap/penjualan/print/{tglAwal}/{tglAkhir}', [RekapPenjualanController::class, 'adminPrint']);
Route::get('admin/rekap/penjualan/print/{id_penjualan}', [RekapPenjualanController::class, 'adminPrintDetail']);

Route::get('pemilik/rekap/penjualan', [RekapPenjualanController::class, 'pemilikIndex']);
Route::get('pemilik/rekap/penjualan/rekap', [RekapPenjualanController::class, 'pemilikRekap']);
Route::get('pemilik/rekap/penjualan/detail/{id_penjualan}', [RekapPenjualanController::class, 'pemilikDetail']);
Route::get('pemilik/rekap/penjualan/print/{tglAwal}/{tglAkhir}', [RekapPenjualanController::class, 'pemilikPrint']);
Route::get('pemilik/rekap/penjualan/print/{id_penjualan}', [RekapPenjualanController::class, 'pemilikPrintDetail']);

//prediksi
Route::get('admin/prediksi', [ForecastingController::class, 'index']);
Route::get('admin/prediksi/chekForecast', [ForecastingController::class, 'checkForecast']);
