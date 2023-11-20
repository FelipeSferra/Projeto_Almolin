<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArmazemController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\TransacaoController;

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
})->middleware(['auth', 'verified'])->name('menu');

Route::middleware(['auth', 'armazem'])->group(function () {
    Route::resource('armazens', ArmazemController::class);
    Route::get('/armazemDelete/{id}', [ArmazemController::class, 'delete']);
});

Route::middleware(['auth', 'categoria'])->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::get('/categoriaDelete/{id}', [CategoriaController::class, 'delete']);
});

Route::middleware(['auth', 'empresa'])->group(function () {
    Route::resource('empresas', EmpresaController::class);
    Route::get('/empresaDelete/{id}', [EmpresaController::class, 'delete']);
});

Route::middleware(['auth', 'funcionario'])->group(function () {
    Route::resource('funcionarios', FuncionarioController::class);
    Route::get('/funcionarioDelete/{id}', [FuncionarioController::class, 'delete']);
});

Route::middleware(['auth', 'produto'])->group(function () {
    Route::resource('produtos', ProdutoController::class);
    Route::get('/produtoDelete/{id}', [ProdutoController::class, 'delete']);
});

Route::middleware(['auth', 'transacao'])->group(function () {
    Route::resource('transacao', TransacaoController::class);
    Route::get('/transacaoDelete/{id}', [TransacaoController::class, 'delete']);
});

require __DIR__ . '/auth.php';
