<?php

use App\Http\Controllers\scheduler;
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

//route untuk mengambil schedule user
Route::get('/schedules/{user_id}', [scheduler::class]);

//route untuk mengambil semua schedule
Route::get('/schedules/all', [scheduler::class]);