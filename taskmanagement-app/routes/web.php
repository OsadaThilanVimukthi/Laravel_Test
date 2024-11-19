<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes(); // Automatically sets up routes for login, register, and logout.

// Tasks Routes (Protected by auth middleware)
Route::resource('/tasks', TaskController::class)->middleware('auth');

// After Login Redirect to Layout
Route::get('/layout', function () {
    return view('layout'); // Ensure a `layout.blade.php` exists in your `resources/views` directory.
})->middleware('auth')->name('layout');

// Override the default /home route after login
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Redirect to tasks after successful login
Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth')->name('tasks.index');


Route::post('single-charge',[HomeController::class,'singleCharge'])->name('single.charge');