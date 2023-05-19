<?php

use App\Http\Controllers\DataAbsensiKader;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataAnakController;
use App\Http\Controllers\DataKader;
use App\Http\Controllers\DataWali;
use Illuminate\Routing\RouteGroup;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::controller(DataAnakController::class)->group(function () {
    Route::get('dataAnak', 'index')->name('dataAnak');
    Route::get('createAnak', 'create')->name('createAnak');
    Route::get('storeAnak', 'store')->name('storeAnak');
    Route::get('detailAnak', 'detail')->name('detailAnak');

    Route::get('editAnak', 'edit')->name('editAnak');
    Route::get('updateAnak', 'update')->name('updateAnak');
    Route::get('deleteAnak', 'delete')->name('deleteAnak');
});

Route::controller(DataKader::class)->group(function () {
    Route::get('dataKader', 'index')->name('dataKader');
    Route::get('createKader', 'create')->name('createKader');
    Route::get('storeKader', 'store')->name('storeKader');
    Route::get('detailKader', 'detail')->name('detailKader');

    Route::get('editKader', 'edit')->name('editKader');
    Route::get('updateKader', 'update')->name('updateKader');
    Route::get('deleteKader', 'delete')->name('deleteKader');
});

Route::controller(DataWali::class)->group(function () {
    Route::get('dataWali', 'index')->name('dataWali');
    Route::get('createWali', 'create')->name('createWali');
    Route::get('storeWali', 'store')->name('storeWali');
    Route::get('detailWali', 'detail')->name('detailWali');

    Route::get('editWali', 'edit')->name('editWali');
    Route::get('updateWali', 'update')->name('updateWali');
    Route::get('deleteWali', 'delete')->name('deleteWali');
});

Route::controller(DataAbsensiKader::class)->group(function () {
    Route::get('dataAbsensiKader', 'index')->name('dataAbsensiKader');
    Route::get('createAbsensiKader', 'create')->name('createAbsensiKader');
    Route::get('storeAbsensiKader', 'store')->name('storeAbsensiKader');
    Route::get('detailAbsensiKader', 'detail')->name('detailAbsensiKader');

    Route::get('editAbsensiKader', 'edit')->name('editAbsensiKader');
    Route::get('updateAbsensiKader', 'update')->name('updateAbsensiKader');
    Route::get('deleteAbsensiKader', 'delete')->name('deleteAbsensiKader');
});
