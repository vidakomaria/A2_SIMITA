<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangPemilikController;

//use App\Http\Controllers\ItemController;



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

//Route::get('/readPenjualan', function (){
//   $penjualan = \App\Models\Penjualan::find(1);
//
//   dd($penjualan->penjualan());
//});

