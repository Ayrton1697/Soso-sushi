<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PedidoController;
use App\Models\Product;
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


Route::view('/', 'index')->name('index');

Route::get('/completa-tu-informacion', function(){
    return view('infopedido',
        [
            'cart'=> Session::get('cart')
           ]);
        })->name('info.pedido');

Route::post('enviar-info',[PedidoController::class, 'enviarInfo'])->name('enviar.info');

Route::get('search-products',[ProductController::class, 'search' ])->name('product.search');

Route::view('/promos', 'promos')->name('promos');

Route::get('/carrito', function(){
    return view('carrito',
    [ 'cart' => Session::get('cart')]);
})->name('carrito');

Route::get('/pedidos', function(){
    return view('pedidos',
[
    'products' => Product::All()]);
})->name('pedidos');

Route::post('add-to-cart', [ProductController::class,'addWithQty'])->name('cart.add');

Route::post('delete-from-cart', [ProductController::class,'delete'])->name('cart.delete');