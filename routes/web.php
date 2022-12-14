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
// <?php

// Auth::routes();
// Route::get('/index', [AuthController::class, 'loginView']);
// Route::get('/{any?}', [AuthController::class, 'index'])->where('any', '.*');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class,"loginView"]);
Route::get('/register', [AuthController::class,"registerView"]);
Route::post('/do-login', [AuthController::class,"doLogin"]);
Route::post('/do-register', [AuthController::class,"doRegister"]);
Route::get('/', [AuthController::class,"dashboard"]);
Route::get('/logout', [AuthController::class,"logout"]);
Route::get('/editSystem/{id}', [AuthController::class,"editDocument"]);
Route::post('/addSystem', [AuthController::class,"addDocument"]);
Route::post('/deleteDocu/{id}', [AuthController::class,"delDocument"]);

//auto directszxc
// Route::get('/home', [AuthController::class,"home"]);
// Route::get('/list', [AuthController::class,"home"]);
// Route::get('/timeline', [AuthController::class,"home"]);
// Route::get('/imgPreview', [AuthController::class,"home"]);
// Route::get('/chart', [AuthController::class,"home"]);

