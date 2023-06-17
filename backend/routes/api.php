<?php

use App\Http\Controllers\Admin;
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
//route untuk mengambil schedule user
Route::get('/schedules/view/{$user_id}', [Scheduler::class, 'get']);

//route untuk mengambil semua schedule
Route::get('/schedules/view/all', [Scheduler::class, 'view']);

//UPDATE
//route untuk memperbaharui data
Route::put('/schedules/update', [Scheduler::class, 'update']);

//DELETE
//route untuk hapus data
Route::delete('/schedules/delete/{$schedule_id}', [Scheduler::class, 'delete']);
