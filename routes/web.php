<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaJuridicaController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/pessoajuridica', function () {
        return Inertia\Inertia::render('PessoaJuridica');
    }
)->name('pessoajuridica');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
