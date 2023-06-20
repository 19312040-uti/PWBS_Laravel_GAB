<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Karyawan;

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


// Route Untuk View
Route::get("/", [jadwal::class, 'index']);

// Route Untuk Hapus
Route::delete("/delete/{parameter}", [jadwal::class, 'delete']);

// Route untuk tambah
Route::get("/add", [jadwal::class, 'add']);

// Route untuk simpan
Route::post("/insert", [jadwal::class, 'insert']);

// Route untuk ubah
Route::get("/update/{parameter}", [jadwal::class, 'update']);
