<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemController;


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


Route::get('/', function (){
   return view('login.index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/admin', function (){
    return view('home.admin.index') ;
})->middleware(['auth','checkUser:karyawan']);

Route::get('/owner', function (){
    return view('home.owner.index');
})->middleware(['auth','checkUser:pemilik']);

Route::resource('/admin/items', ItemController::class)->middleware(['auth','checkUser:karyawan']);
Route::get('admin/items/checkCategory', [ItemController::class, 'checkCategory']);

//Route::get('owner/items', [ItemController::class, 'items']);
//Route::get('admin/items/search', [ItemController::class, 'search']);

Route::resource('/owner/items', ItemController::class)->middleware(['auth','checkUser:pemilik']);
