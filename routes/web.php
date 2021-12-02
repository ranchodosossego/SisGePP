<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\LoteController;

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

Auth::routes();

/*
-- Controller: Autenticação
*/

Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
-- Controller: Rebanho
*/
//Route::get('lote', 'App\Http\Controllers\RebanhoController@lote');

Route::get('/rebanho', [App\Http\Controllers\RebanhoController::class, 'index']);
Route::get('animal', 'App\Http\Controllers\RebanhoController@animal');

// --Info: Lote
Route::get('lote', [App\Http\Controllers\LoteController::class, 'index']);
// Route::post('lote', [App\Http\Controllers\LoteController::class, 'read']);
Route::get('/getAnimalList', [App\Http\Controllers\LoteController::class, 'getAnimalList'])->name('get.animal.list');
Route::post('/getAnimalListLote', [App\Http\Controllers\LoteController::class, 'getAnimalListLote'])->name('get.animal.list.lote');

//Route::get('/getAnimalListLote/{id}', 'LoteController@bar');

/*
-- Controller: AnimalController
*/
Route::get('animal', [AnimalController::class, 'index']);
Route::post('animal', [AnimalController::class, 'create']);
Route::get('read', [AnimalController::class, 'read']);
