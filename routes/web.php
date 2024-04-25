<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;


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
//Route::resource('products', ProductController::class);
Route::resource('students', StudentController::class);



//18-4-2024 test POSTman////////////////////////////////////////////
Route::get('details', [ProductController::class, 'details']);

Route::GET('insertProductView', function () {
  return view('form');
});

Route::POST('insertarProduct', [ProductController::class,'insertProduct']);

Route::Get('getProduct/{id}',[ProductController::class,'getProduct']);
/////////////////////////////////////////////////////////////////////


//Route::get('assist/{id}', [StudentController::class, 'find'])->name("StudentAssist");
