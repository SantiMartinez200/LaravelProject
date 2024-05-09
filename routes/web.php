<?php

use App\Http\Controllers\AssistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParamController;
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

  Route::get('panel', [ParamController::class,'getParams'])->name('panel');

  Route::get('/sign', function () {
    return view('students.sign');
  })->name('signView');
  
  Route::POST('findThis/{dni}', [StudentController::Class,'findThis'])->name('findThis');
  Route::GET('storeFromButton/{id}', [AssistController::class, 'storeFromButton'])->name('storeFromButton');
});

require __DIR__.'/auth.php';
