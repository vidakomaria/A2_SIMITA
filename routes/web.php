<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\EmployeeController;



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

    Route::resource('/admin/items', ItemController::class);
});


Route::group(['middleware'=>['auth', 'checkUser:pemilik']], function (){
    Route::get('/pemilik', function (){
        return view('pemilik.home.index');});

    Route::get('pemilik/items', [ItemController::class, 'items']);
    Route::get('pemilik/items/{id}', [ItemController::class, 'showPemilik']);
    Route::get('pemilik/items/{id}/edit', [ItemController::class, 'editPemilik']);
    Route::put('pemilik/items/{id}', [ItemController::class, 'updatePemilik']);
    Route::delete('pemilik/items/{id}', [ItemController::class, 'delete']);

    Route::resource('/pemilik/karyawan', EmployeeController::class);

    Route::get('pemilik/data_karyawan/{id}/edit', [KaryawanController::class, 'edit']);

    Route::put('pemilik/data_karyawan/{id}', [KaryawanController::class, 'update']);

    Route::delete('pemilik/data_karyawan/{id}', [KaryawanController::class, 'delete']);
});


