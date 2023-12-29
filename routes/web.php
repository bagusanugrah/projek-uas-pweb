<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/motor/add', [MotorController::class, 'getAddMotorPage'])->name('motor.add');
Route::post('/motor/add', [MotorController::class, 'postAMotor'])->name('motor.post');
Route::get('/motor/edit', [MotorController::class, 'showEditPage'])->name('motor.show');
Route::post('/motor/edit', [MotorController::class, 'editMotorButton'])->name('motor.edit');
Route::post('/motor/update', [MotorController::class, 'updateAMotor'])->name('motor.update');
Route::post('/motor/delete', [MotorController::class, 'deleteAMotor'])->name('motor.delete');
Route::post('/motor/rent', [TransaksiController::class, 'rentAMotor'])->name('motor.rent');
Route::post('/motor/return', [TransaksiController::class, 'returnAMotor'])->name('motor.return');