<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserinfoController;
use App\Http\Controllers\UserAjaxController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', [UserinfoController::class, 'index']);
Route::get('/dashboard', [UserinfoController::class, 'dashboard']); 
Route::post('/register', [UserinfoController::class, 'register'])->name('register');
Route::get('/login', [UserinfoController::class, 'loginpage']);
Route::get('/view', [UserinfoController::class, 'viewusers']);
Route::get('/display', [UserinfoController::class, 'display']);
Route::get('/destroy', [UserinfoController::class, 'destroy']);
Route::post('/loginsuccess', [UserinfoController::class, 'customLogin'])->name('customLogin');
Route::resource('ajaxuser', UserAjaxController::class);


