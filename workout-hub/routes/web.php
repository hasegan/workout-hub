<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrainingController;
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

Route::get('/', function () {
    return view('home');
});


Route::resource('categories', CategoryController::class)->name('index', 'categories');

Route::resource('trainings', TrainingController::class)->name('index', 'trainings');;

Route::get('cancelEditCategory/{id}', [CategoryController::class, 'cancelEditCategory']);

Route::get('cancelEditTraining/{id}', [TrainingController::class, 'cancelEditTraining']);

Route::get('checkExistingCategory/{category}', [CategoryController::class, 'checkExistingCategory']);
