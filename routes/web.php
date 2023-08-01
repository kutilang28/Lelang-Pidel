<?php

use App\Http\Controllers\AdminController;
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
    Route::get('/',[SesiController::class,'index'])->name('login');
    Route::post('/',[SesiController::class,'login']);
});
Route::get('/home', function () {
    return redirect('/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin',[AdminController::class,'index']);
    Route::get('/admin/admin',[AdminController::class,'admin'])->middleware('userAkses:administrator');
    Route::get('/admin/petugas',[AdminController::class,'petugas'])->middleware('userAkses:petugas');
    Route::get('/admin/masyarakat',[AdminController::class,'masyarakat'])->middleware('userAkses:masyarakat');
    Route::get('/logout', [SesiController::class, 'logout']);
});