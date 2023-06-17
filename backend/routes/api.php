<?php

use App\Http\Controllers\Scheduler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//SCHEDULE API
//CREATE
//route untuk menambahkan schedule baru
Route::post('/schedules/create', [Scheduler::class, 'create']);

//READ
//route untuk mengambil schedule user (hanya yang aktif)
Route::get('schedules/view', [Scheduler::class, 'viewAsUser']);

//route untuk mengambil semua schedule (akses admin)
Route::get('/schedules/view/all', [Scheduler::class, 'view']);

//route untuk mengambil schedule tertentu
Route::get('/schedules/view/{schedule_id}', [Scheduler::class, 'get']);

//UPDATE
//route untuk memperbaharui data
Route::put('/schedules/update/{updateData}', [Scheduler::class, 'update']);

//route untuk meng-set status schedule sebagai selesai
Route::put('/schedules/update/finish/{schedule_id}', [Scheduler::class, 'finish']);

//route untuk meng-set status schedule sebagai belum selesai
Route::put('/schedules/update/unfinish/{schedule_id}', [Scheduler::class, 'unfinish']);

//DELETE
//route untuk hapus data
Route::delete('/schedules/delete/{schedule_id}', [Scheduler::class, 'delete']);
