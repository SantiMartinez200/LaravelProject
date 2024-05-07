<?php

use App\Http\Controllers\AssistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
  return view('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::resource('students', StudentController::class);

  Route::get('assist/{id}', [StudentController::class, 'find'])->name("StudentAssist");

  Route::get('/sign', [AssistController::class, 'getTodayDate']);

  Route::get('/controlPanel', function () {
    return view('students.controlPanel');
  })->name('panel');

  Route::get('signForm', [AssistController::Class,'store'])->name('signForm');
});

require __DIR__.'/auth.php';
