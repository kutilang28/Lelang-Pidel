<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\ItemPetController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporanAdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SesiController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/',[BidController::class,'index']);
    Route::get('/login',[SesiController::class,'index'])->name('login');
    Route::post('/login',[SesiController::class,'login']);
    Route::get('/register',[SesiController::class,'getregister']);
    Route::post('/register', [SesiController::class,'register']);
});
Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/admin',[AdminController::class,'admin'])->middleware('userAkses:administrator');
    Route::get('/admin/petugas',[AdminController::class,'petugas'])->middleware('userAkses:petugas');
    Route::get('/masyarakat',[AdminController::class,'masyarakat'])->middleware('userAkses:masyarakat');
    Route::resource('items', ItemsController::class)->middleware('userAkses:administrator');
    Route::resource('itempet', ItemPetController::class)->middleware('userAkses:petugas');
    Route::resource('bid', BidController::class)->middleware('userAkses:masyarakat');
    Route::resource('petugas', PetugasController::class)->middleware('userAkses:administrator');
    Route::resource('laporan', LaporanController::class)->middleware('userAkses:petugas');
    Route::resource('laporanmin', LaporanAdminController::class)->middleware('userAkses:administrator');
    Route::get('/logout', [SesiController::class, 'logout']);
});