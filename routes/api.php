<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/findAllSong',[\App\Http\Controllers\API\SongController::class,'list'])->name('findAllSongs');
Route::get('findsongbyid/{id}',[\App\Http\Controllers\API\SongController::class,'findById'])->name('findById');
Route::get('updatebyid/{id}',[\App\Http\Controllers\API\SongController::class,'updatebyid'])->name('updatebyid');
Route::get('addview/{id}',[\App\Http\Controllers\API\SongController::class,'addview'])->name('addview');
