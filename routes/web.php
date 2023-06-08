<?php

use App\Http\Controllers\DataAbsensiKader;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataAnakController;
use App\Http\Controllers\DataFisik;
use App\Http\Controllers\DataKader;
use App\Http\Controllers\DataSuplement;
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
    Route::post('storeAnak', 'store')->name('storeAnak');
    Route::get('detailAnak', 'detail')->name('detailAnak');

    Route::get('editAnak/{id}', 'edit')->name('editAnak');
    Route::post('updateAnak/{id}', 'update')->name('updateAnak');
    Route::post('deleteAnak/{id}', 'delete')->name('deleteAnak');
});

Route::controller(DataKader::class)->group(function () {
    Route::get('dataKader', 'index')->name('dataKader');
    Route::get('createKader', 'create')->name('createKader');
    Route::post('storeKader', 'store')->name('storeKader');
    Route::get('detailKader', 'detail')->name('detailKader');

    Route::get('editKader/{id}', 'edit')->name('editKader');
    Route::post('updateKader/{id}', 'update')->name('updateKader');
    Route::post('deleteKader/{id}', 'delete')->name('deleteKader');
});

Route::controller(DataWali::class)->group(function () {
    Route::get('dataWali', 'index')->name('dataWali');
    Route::get('createWali', 'create')->name('createWali');
    Route::post('storeWali', 'store')->name('storeWali');
    Route::get('detailWali', 'detail')->name('detailWali');

    Route::get('editWali/{id}', 'edit')->name('editWali');
    Route::post('updateWali/{id}', 'update')->name('updateWali');
    Route::post('deleteWali/{id}', 'delete')->name('deleteWali');
});

Route::controller(DataAbsensiKader::class)->group(function () {
    Route::get('dataAbsensiKader', 'index')->name('dataAbsensiKader');
    Route::get('absensi_kader/{bulan_absensi}', 'data_absensi')->name('data_absensi');

    Route::get('createAbsensiKader', 'create')->name('createAbsensiKader');
    Route::post('storeAbsensiKader', 'store')->name('storeAbsensiKader');
    Route::get('detailAbsensiKader', 'detail')->name('detailAbsensiKader');

    Route::get('editAbsensiKader/{bulan_absensi}', 'edit')->name('editAbsensiKader');
    Route::post('updateAbsensiKader/{bulan_absensi}', 'update')->name('updateAbsensiKader');
    Route::post('deleteAbsensiKader/{bulan_absensi}', 'delete')->name('deleteAbsensiKader');
});

Route::controller(DataSuplement::class)->group(function () {
    Route::get('dataSuplement', 'index')->name('dataSuplement');
    Route::get('createSuplement', 'create')->name('createSuplement');
    Route::post('storeSuplement', 'store')->name('storeSuplement');
    Route::get('detailSuplement', 'detail')->name('detailSuplement');

    Route::get('editSuplement/{id}', 'edit')->name('editSuplement');
    Route::post('updateSuplement/{id}', 'update')->name('updateSuplement');
    Route::post('deleteSuplement/{id}', 'delete')->name('deleteSuplement');
});

Route::controller(DataFisik::class)->group(function () {
    Route::get('dataFisik', 'index')->name('dataFisik');
    Route::get('createFisik', 'create')->name('createFisik');
    Route::post('storeFisik', 'store')->name('storeFisik');
    Route::get('detailFisik', 'detail')->name('detailFisik');

    Route::get('editFisik/{id}', 'edit')->name('editFisik');
    Route::post('updateFisik/{id}', 'update')->name('updateFisik');
    Route::post('deleteFisik/{id}', 'delete')->name('deleteFisik');
});
