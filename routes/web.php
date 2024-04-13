<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produtosController;

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
	Route::delete('/delete', [produtosController::class,'delete'])->name('produto.delete');

});


