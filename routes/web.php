<?php

use App\Http\Controllers\ArmazemController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmpresaController;
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
    return view('menu');
});

Route::resources([
    '/produtos'=>ProdutoController::class,
    ]);

Route::resources([
    '/funcionarios'=>FuncionarioController::class,
    ]);

Route::resources([
    '/categorias'=>CategoriaController::class,
    ]);

Route::resources([
    '/empresas'=>EmpresaController::class,
    ]);

Route::resources([
    '/armazens'=>ArmazemController::class,
    ]);
    