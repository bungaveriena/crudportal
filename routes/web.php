<?php

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

// Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
// Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
// Route::post('login', [AuthController::class, 'login']);
// Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
// Route::post('register', [AuthController::class, 'register']);

Route::resource('divisi', DivisiController::class);
Route::resource('portalweb', PortalWebController::class);
Route::get('/', function () {
    return view('portal/index');
}); 

