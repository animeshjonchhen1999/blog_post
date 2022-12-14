<?php

use App\Http\Controllers\Api\ApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', [ApiController::class,'index']);
Route::get('/posts/{id}', [ApiController::class,'show']);
Route::post('/posts', [ApiController::class, 'store']);
Route::delete('/posts/{id}', [ApiController::class, 'destroy']);
Route::put('/posts/{id}', [ApiController::class, 'update']);