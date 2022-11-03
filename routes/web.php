<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

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

Route::get('/', [QuizController::class, 'index'])->name('quiz');
Route::post('/', [QuizController::class, 'store'])->name('quiz.save');
Route::get('/thankyou/', function () {
    return view('thankyou');
})->name('quiz.thankyou');
