<?php

use App\Http\Controllers\ArmazemController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\TransacaoController;
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
    '/funcionarios'=>FuncionarioController::class,
    '/categorias'=>CategoriaController::class,
    '/empresas'=>EmpresaController::class,
    '/armazens'=>ArmazemController::class,
    '/transacao' => TransacaoController::class
]);

Route::get('/produtoDelete/{id}', [ProdutoController::class, 'delete']);
Route::get('/funcionarioDelete/{id}', [FuncionarioController::class, 'delete']);
Route::get('/categoriaDelete/{id}', [CategoriaController::class, 'delete']);
Route::get('/empresaDelete/{id}', [EmpresaController::class, 'delete']);
Route::get('/armazemDelete/{id}', [ArmazemController::class, 'delete']);
Route::get('/transacaoDelete/{id}', [TransacaoController::class, 'delete']);
