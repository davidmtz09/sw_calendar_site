<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SearchController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/events', SearchController::class)->name('events');
Route::resource('appointment', AppointmentController::class);
//Route::get('/appointments', [AppointmentController::class, 'index2']);
Route::get('/appointments', [AppointmentController::class, 'index2'])->name('appointments.index2');


// Ejemplo en web.php
// Route::get('/agenda/edit/{appointment}', 'AppointmentController@edit');
