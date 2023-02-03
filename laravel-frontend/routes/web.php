<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GetuserController;

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
    return view('index');
});

Route::resource('user', UserController::class);

Route::get('getuser', [GetuserController::class, 'getuser'])->name('getuser');
Route::post('getuser', [GetuserController::class, 'getuser']);
Route::post('useradd', [GetuserController::class, 'useradd']);
