<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Painel\Rebanho\AnimalController;
use App\Http\Controllers\Painel\Rebanho\LoteController;
use App\Http\Controllers\Painel\Rebanho\GrauSangueController;
use App\Http\Controllers\Painel\Rebanho\DietaController;
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

// --: Controller: Autenticação
Route::get('/user/profile', [App\Http\Controllers\UserProfileController::class, 'show'])->name('profile');

// --: FileController
Route::resource('/painel/id', 'App\Http\Controllers\Painel\Configuracao\FileController')->names('painel.configuracao');

// --:
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// --: Lote Controller: Rebanho
Route::get('/rebanho', [App\Http\Controllers\Painel\Rebanho\RebanhoController::class, 'index']);
Route::get('animal', 'App\Http\Controllers\Painel\Rebanho\RebanhoController@animal');

// --: Lote
Route::get('lote', [App\Http\Controllers\Painel\Rebanho\LoteController::class, 'index']);

// --: Tipo Lote
Route::post('/getTipoLote', [App\Http\Controllers\Painel\Rebanho\TipoLoteController::class, 'getTipoLote'])->name('get.tipo.lote');
Route::get('/obtemTipoLote', [App\Http\Controllers\Painel\Rebanho\TipoLoteController::class, 'obtemTipoLote'])->name('obtem.tipo.lote');

// --: Controller: GrauSangueController
Route::post('/getGrauSangue', [App\Http\Controllers\Painel\Rebanho\GrauSangueController::class, 'getGrauSangue'])->name('get.grau.sangue');

// --: Controller: AnimalController
Route::get('animal', [App\Http\Controllers\Painel\Rebanho\AnimalController::class, 'index']);
Route::post('animal', [App\Http\Controllers\Painel\Rebanho\AnimalController::class, 'create']);
Route::get('/getAnimalList', [App\Http\Controllers\Painel\Rebanho\AnimalController::class, 'getAnimalList'])->name('get.animal.list');
Route::get('/getAnimal', [App\Http\Controllers\Painel\Rebanho\AnimalController::class, 'getAnimal'])->name('get.animal');
Route::get('getAnimal', 'App\Http\Controllers\Painel\Rebanho\AnimalController@getAnimal');
Route::post('/updateLoteAnimal', [App\Http\Controllers\Painel\Rebanho\AnimalController::class, 'updateLoteAnimal'])->name('update.lote.animal');
Route::post('/getLotesAnimal', [App\Http\Controllers\Painel\Rebanho\AnimalController::class, 'getLotesAnimal'])->name('get.lotes.animal');
Route::post('update', [App\Http\Controllers\Painel\Rebanho\AnimalController::class, 'update'])->name('update.animal');

Route::get('/getfichatecnica/{idanimal}', [App\Http\Controllers\Painel\Rebanho\AnimalController::class, 'getFichaTecnica']);

// --: Dieta
Route::get('dieta', [App\Http\Controllers\Painel\Alimentacao\DietaController::class, 'index']);
Route::get('/getDieta', [App\Http\Controllers\Painel\Alimentacao\DietaController::class, 'getDieta'])->name('get.dieta');

// --: Alimento
Route::get('/getNutrienteAlimentos', [App\Http\Controllers\Painel\Alimentacao\AlimentoController::class, 'getNutrienteAlimentos'])->name('get.nutriente.alimentos');

//--: Sanidade
Route::get('/prontuario', [App\Http\Controllers\Painel\Sanidade\ProntuarioController::class, 'index']);
Route::get('/prontuario/{idanimal}', [App\Http\Controllers\Painel\Sanidade\ProntuarioController::class, 'getProntuario']);
Route::get('/getP', [App\Http\Controllers\Painel\Sanidade\ProntuarioController::class, 'getP'])->name('get.dieta');

// --: Estoque
Route::get('/racao', [App\Http\Controllers\Painel\Estoque\EstoqueController::class, 'racao']);
