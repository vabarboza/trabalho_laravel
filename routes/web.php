<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

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
    return redirect('produtos');
});

//Rotas produtos
Route::get('/produtos', [ProdutosController::class, 'index'])->name('produtos.index');
Route::get('/produtos/novo', [ProdutosController::class, 'create'])->name('produtos.create');
Route::post('/produtos/salvar', [ProdutosController::class, 'store'])->name('produtos.salvar');
Route::get('/produtos/editar/{id}', [ProdutosController::class, 'edit'])->name('produtos.editar');
Route::post('/produtos/gravar/{id}', [ProdutosController::class, 'update'])->name('produtos.update');
Route::get('/produtos/apagar/{id}', [ProdutosController::class, 'destroy'])->name('produtos.apagar');
Route::get('/produtos/{slug}', [ProdutosController::class, 'show'])->name('produtos.mostrar');
