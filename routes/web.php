<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ServiceController;

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

# ------ Unauthenticated routes ------ #
Route::get('/', [RouteController::class, 'index']);
Route::post('/create-appointment', [RouteController::class, 'createAppointment'])->name('create-appointment');
require __DIR__.'/auth.php';


# ------ Authenticated routes ------ #
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('home'); # dashboard

    Route::prefix('profile')->group(function(){
        Route::get('/', [ProfileController::class, 'myProfile'])->name('profile');
        Route::put('/change-ava', [ProfileController::class, 'changeFotoProfile'])->name('change-ava');
        Route::put('/change-profile', [ProfileController::class, 'changeProfile'])->name('change-profile');
    }); # profile group

    Route::resource('barbers', BarberController::class);
    Route::resource('services', ServiceController::class);
    Route::put('/appointments/{appointment}/change-status', [AppointmentController::class, 'updateStatus'])->name('appointments.update-status');
    Route::get('/appointments/{appointment}/invoice', [AppointmentController::class, 'printInvoice'])->name('appointments.print-invoice');
    Route::resource('appointments', AppointmentController::class);
});
