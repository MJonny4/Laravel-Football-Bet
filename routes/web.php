<?php

use App\Http\Controllers\ApostesController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\JornadesController;
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

Route::view('/', 'inici')->name('inici');

Route::get('/jornada', [JornadesController::class, 'index'])->name('jornades.index');
Route::get('/jornada/{jornada}', [JornadesController::class, 'show'])->name('jornades.show');
Route::post('/jornada/store', [JornadesController::class, 'store'])->name('jornades.store');
Route::get('/jornada/{jornada}/export', [JornadesController::class, 'export'])->name('jornades.export');

Route::middleware(['auth'])->group(function () {
    Route::get('/apostes', [ApostesController::class, 'index'])->name('apostes.index');
    Route::get('/apostes/{jornada}', [ApostesController::class, 'show'])->name('apostes.show');
    Route::post('/apostes/{jornada}/store', [ApostesController::class, 'store'])->name('apostes.store');
    Route::put('/apostes/{jornada}/update', [ApostesController::class, 'update'])->name('apostes.update');
});

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/activar/{token}', [RegisteredUserController::class, 'activar'])->name('activar');
