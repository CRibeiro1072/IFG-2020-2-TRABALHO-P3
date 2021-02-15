<?php

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
    return view('auth.login');
});

Route::get('/main', function () {
//    return redirect()->route('main');
    return view('main');
})->middleware(['auth'])->name('main');

Route::resource('clientes', \App\Http\Controllers\ClienteController::class)->middleware(['auth']);
Route::resource('categorias', \App\Http\Controllers\CategoriaController::class)->middleware(['auth']);
Route::resource('produtos', \App\Http\Controllers\ProdutoController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
