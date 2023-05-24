<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataAnakController;
use App\Http\Controllers\DataKaderController;
use App\Http\Controllers\DataWaliController;

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

Route::get('dataKader', [DataKaderController::class, 'index'])->name('dataKader');
Route::get('createKader', [DataKaderController::class, 'create'])->name('createKader');
Route::post('storeKader', [DataKaderController::class, 'store'])->name('storeKader');

Route::get('dataAnak', [DataAnakController::class, 'index'])->name('dataAnak');
Route::get('createAnak', [DataAnakController::class, 'create'])->name('createAnak');
Route::post('storeAnak', [DataAnakController::class, 'store'])->name('storeAnak');

Route::get('dataWali', [DataWaliController::class, 'index'])->name('dataWali');
Route::get('createWali', [DataWaliController::class, 'create'])->name('createWali');
Route::post('storeWali',[DataWaliController::class, 'store'])->name('storeWali');
