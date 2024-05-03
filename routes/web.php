<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produtosController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\UsuarioController;

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
    return view('index');
});

Route::prefix('produtos')->group(function () {

	Route::get('/', [produtosController::class,'index'])->name('produto.index');
	//cdastro de produto
	Route::get('/cadastrarProduto', [produtosController::class,'cadastrarProduto'])->name('cadastrar.produto');
	Route::post('/cadastrarProduto', [produtosController::class,'cadastrarProduto'])->name('cadastrar.produto');

	//atualiza cadastro

	Route::get('/atualizarProduto/{id}', [produtosController::class,'atualizarProduto'])->name('atualizar.produto');
	Route::put('/atualizarProduto/{id}', [produtosController::class,'atualizarProduto'])->name('atualizar.produto');


	Route::delete('/delete', [produtosController::class,'delete'])->name('produto.delete');

});

Route::prefix('clientes')->group(function () {

	Route::get('/', [clientesController::class,'index'])->name('clientes.index');
	//cdastro de cliente
	Route::get('/cadastrarCliente', [clientesController::class,'cadastrarCliente'])->name('cadastrar.cliente');
	Route::post('/cadastrarCliente', [clientesController::class,'cadastrarCliente'])->name('cadastrar.cliente');

	//atualiza cliente

	Route::get('/atualizarCliente/{id}', [clientesController::class,'atualizarCliente'])->name('atualizar.cliente');
	Route::put('/atualizarCliente/{id}', [clientesController::class,'atualizarCliente'])->name('atualizar.cliente');


	Route::delete('/delete', [clientesController::class,'delete'])->name('cliente.delete');

});


Route::prefix('usuario')->group(function () {

	Route::get('/', [UsuarioController::class,'index'])->name('usuario.index');

	Route::get('/cadastrarUsuario', [UsuarioController::class,'cadastrarUser'])->name('cadastrar.usuario');
	
	Route::post('/cadastrarUsuario', [UsuarioController::class,'cadastrarUser'])->name('cadastrar.usuario');

	//atualiza Usuario

	Route::get('/atualizarUsuario/{id}', [UsuarioController::class,'atualizarUser'])->name('atualizar.usuario');

	Route::put('/atualizarUsuario/{id}', [UsuarioController::class,'atualizarUser'])->name('atualizar.usuario');


	Route::delete('/delete', [UsuarioController::class,'delete'])->name('usuario.delete');
	

});


