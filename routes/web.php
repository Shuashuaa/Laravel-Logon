<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class,"loginView"]);
Route::get('/register', [AuthController::class,"registerView"]);
Route::post('/do-login', [AuthController::class,"doLogin"]);
Route::post('/do-register', [AuthController::class,"doRegister"]);
Route::get('/', [AuthController::class,"dashboard"]);
Route::get('/logout', [AuthController::class,"logout"]);