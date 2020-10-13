<?php

use App\Http\Controllers\PessoaFisicaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaJuridicaController;
<<<<<<< HEAD
use App\Models\PessoaFisica;
use App\Models\PessoaJuridica;

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

Route::get('/pessoajuridica/listatipo', [PessoaJuridicaController::class, 'listaTipoEmpresa']);
Route::get('/pessoajuridica/listatpestabelecimento', [PessoaJuridicaController::class, 'listaTipoEstabelecimento']);
Route::get('/pessoajuridica/salvar', [PessoaJuridicaController::class, 'salvar'])->middleware(['auth:sanctum', 'verified']);
Route::get('/pj/pessoajuridica/lista', [PessoaJuridicaController::class, 'lista'])->middleware(['auth:sanctum', 'verified']);
Route::get('/pf/pessoafisica/lista', [PessoaFisicaController::class, 'lista'])->middleware(['auth:sanctum', 'verified']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/pj/pessoajuridica', function () {
//     return Inertia\Inertia::render('pj/ListaPessoaJuridica', ['pjs' => PessoaJuridica::all()]);
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('pj/pessoajuridica', function () {
    return Inertia\Inertia::render('pj/ListaPessoaJuridica');
})->name('listapessoajuridica');

Route::middleware(['auth:sanctum', 'verified'])->get(
    'pf/pessoafisica', function () {
        return Inertia\Inertia::render('pf/ListaPessoaFisica');
    }
)->name('listapessoafisica');

// Route::middleware(['auth:sanctum', 'verified'])->get(
//     'pf/pessoafisica/dados/', function () {
//         return Inertia\Inertia::render('pf/PessoaFisica');
//     }
// )->name('novapessoafisica');


// Route::middleware(['auth:sanctum', 'verified'])->get(
//     'pj/pessoajuridica/dados/', function () {
//         return Inertia\Inertia::render('pj/PessoaJuridica');
//     }
// )->name('novapessoajuridica');

Route::get('pj/pessoajuridica/dados', [PessoaJuridicaController::class, 'index'])->name('pj.pessoajuridica.create');
Route::get('pj/pessoajuridica/dados/{id}', [PessoaJuridicaController::class, 'dados'])->name('pj.pessoajuridica.edit');
Route::get('pj/pessoafisica/dados/{id}', [PessoaFisicaController::class, 'dados'])->name('pf.pessoafisica.edit');
=======

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

    Route::group(['middleware' => ['auth']], function() {

    Route::get('/pessoajuridica/listatipo', [PessoaJuridicaController::class, 'listaTipoEmpresa']);
    Route::get('/pessoajuridica/listatpestabelecimento', [PessoaJuridicaController::class, 'listaTipoEstabelecimento']);
    Route::get('/pessoajuridica/salvar', [PessoaJuridicaController::class, 'salvar'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pj/pessoajuridica/lista', [PessoaJuridicaController::class, 'lista'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pf/pessoafisica/lista', [PessoaFisicaController::class, 'lista'])->middleware(['auth:sanctum', 'verified']);
    Route::get('/pessoafisica/nacionalidade', [PessoaFisicaController::class, 'listaNacionalidade'])->middleware(['auth:sanctum', 'verified']);
    Route::redirect('/', 'login');


    // Route::middleware(['auth:sanctum', 'verified'])->get('/pj/pessoajuridica', function () {
    //     return Inertia\Inertia::render('pj/ListaPessoaJuridica', ['pjs' => PessoaJuridica::all()]);
    // });

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return Inertia\Inertia::render('Dashboard');
    })->name('dashboard');

    Route::middleware(['auth:sanctum', 'verified'])->get('pj/pessoajuridica', function () {
        return Inertia\Inertia::render('pj/ListaPessoaJuridica');
    })->name('listapessoajuridica');

    Route::middleware(['auth:sanctum', 'verified'])->get('pf/pessoafisica', function () {
        return Inertia\Inertia::render('pf/ListaPessoaFisica');
    })->name('listapessoafisica');

    // Route::middleware(['auth:sanctum', 'verified'])->get('pj/pessoajuridica/dados/{id}', function () {
    //     return Inertia\Inertia::render(['pj'=>'pj/PessoaJuridica']);
    // });

    Route::get('pj/pessoajuridica/dados/{id}', [PessoaJuridicaController::class, 'dados'])->name('pj.pessoajuridica.edit')->middleware(['auth:sanctum', 'verified']);
    Route::get('pf/pessoafisica/dados/{id}', [PessoaFisicaController::class, 'dados'])->name('pf.pessoafisica.edit')->middleware(['auth:sanctum', 'verified']);

});
>>>>>>> 7a6cf520f87b3e1060163606fea5888e2fe51c5d
