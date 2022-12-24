<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MhsController;

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

Route::get('/', function () {
    return view('welcome');
});
 
Route::resource('mahasiswa', MhsController::class);
Route::get('delete/{mahasiswa}', [\App\Http\Controllers\MhsController::class, 'destroy']);
Route::get('/sertifikat/{mahasiswa}', [\App\Http\Controllers\FillPDFController::class, 'process']);
Route::get('/search', [\App\Http\Controllers\MhsController::class, 'search']);
