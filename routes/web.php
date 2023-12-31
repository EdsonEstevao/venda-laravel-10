<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\SecretariasController;
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
    // return view('welcome');
    return view('index');
});
Route::prefix('produtos')->group(function() {
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    Route::get('/create', [ProdutosController::class, 'create'])->name('produto.create');
    Route::post('/store', [ProdutosController::class, 'store'])->name('produto.store');
    Route::get('/edit', [ProdutosController::class, 'edit'])->name('produto.edit');
    Route::put('/update', [ProdutosController::class, 'update'])->name('produto.update');
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});
Route::prefix('secretarias')->group(function() {
    Route::get('/', [SecretariasController::class, 'index'])->name('secretaria.index');
    Route::get('/create', [SecretariasController::class, 'create'])->name('secretaria.create');
    Route::post('/store', [SecretariasController::class, 'store'])->name('secretaria.store');
    Route::get('/edit', [SecretariasController::class, 'edit'])->name('secretaria.edit');
    Route::put('/update', [SecretariasController::class, 'update'])->name('secretaria.update');
    Route::delete('/delete', [SecretariasController::class, 'delete'])->name('secretaria.delete');
});

