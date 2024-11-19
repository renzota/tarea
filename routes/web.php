<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
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
    return view('frontend.template.main');
});

Route::get('/backend', function () {
    return view('backend.template.main');
})->name('backend');



//inicio de sesion 
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/backend/content/edit/{type}', [ContentController::class, 'index'])->name('content.edit');
Route::put('/backend/content/{type}', [ContentController::class, 'update'])->name('content.update');