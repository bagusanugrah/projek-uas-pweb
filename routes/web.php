<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MotorController;

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

Route::get('/daftar', [DaftarController::class, 'show'])->name('daftar.get');
Route::post('/daftar', [DaftarController::class, 'post'])->name('daftar.post');

Route::get('/login', [LoginController::class, 'show'])->name('login.get');
Route::post('/login', [LoginController::class, 'post'])->name('login.post');

Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard.get');
Route::get('/logout', [DashboardController::class, 'logout'])->name('dashboard.logout');

Route::get('/motor/add', [MotorController::class, 'add'])->name('motor.add');
Route::post('/motor/add', [MotorController::class, 'post'])->name('motor.post');
Route::get('/motor/edit', [MotorController::class, 'show'])->name('motor.show');
Route::post('/motor/edit', [MotorController::class, 'edit'])->name('motor.edit');
Route::post('/motor/update', [MotorController::class, 'update'])->name('motor.update');
Route::post('/motor/delete', [MotorController::class, 'delete'])->name('motor.delete');
Route::post('/motor/rent', [MotorController::class, 'rent'])->name('motor.rent');