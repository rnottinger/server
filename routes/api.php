<?php

use App\Http\Controllers\UserController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::get('/', function () {
//    return 'hello world';
//});
Route::get('/', [UserController::class, 'index']);

// we need to access this route when we are logged in
Route::get('/user', [UserController::class, 'user'])->middleware('auth:api');

Route::post('/register', [UserController::class, 'register']);
