<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\GrauSangueController;
use App\Http\Controllers\DietaController;
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

// --> Controller: Autenticação
Route::get('/user/profile', [App\Http\Controllers\UserProfileController::class, 'show'])->name('profile');

// -->
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// --> Lote Controller: Rebanho
Route::get('/rebanho', [App\Http\Controllers\RebanhoController::class, 'index']);
Route::get('animal', 'App\Http\Controllers\RebanhoController@animal');

// --> Lote
Route::get('lote', [App\Http\Controllers\LoteController::class, 'index']);

// --> Tipo Lote
Route::post('/getTipoLote', [App\Http\Controllers\TipoLoteController::class, 'getTipoLote'])->name('get.tipo.lote');
Route::get('/obtemTipoLote', [App\Http\Controllers\TipoLoteController::class, 'obtemTipoLote'])->name('obtem.tipo.lote');

// --> Controller: GrauSangueController
Route::post('/getGrauSangue', [App\Http\Controllers\GrauSangueController::class, 'getGrauSangue'])->name('get.grau.sangue');


// --> Controller: AnimalController
Route::get('animal', [App\Http\Controllers\AnimalController::class, 'index']);
Route::post('animal', [App\Http\Controllers\AnimalController::class, 'create']);
Route::get('/getAnimalList', [App\Http\Controllers\AnimalController::class, 'getAnimalList'])->name('get.animal.list');
Route::get('/getAnimal', [App\Http\Controllers\AnimalController::class, 'getAnimal'])->name('get.animal');
Route::get('getAnimal', 'App\Http\Controllers\AnimalController@getAnimal');
Route::post('/updateAnimal', [App\Http\Controllers\AnimalController::class, 'updateAnimal'])->name('update.animal');
Route::post('/getLotesAnimal', [App\Http\Controllers\AnimalController::class, 'getLotesAnimal'])->name('get.lotes.animal');

// --> Dieta
Route::get('dieta', [App\Http\Controllers\DietaController::class, 'index']);
//Route::post('dieta', [App\Http\Controllers\DietaController::class, 'index'])->name('painel.rebanho.dieta');

