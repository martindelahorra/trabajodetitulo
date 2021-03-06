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
    return view('welcome');
});

// Pizzas
Route::get('/pizzas/crear/{tamano}','PizzasController@ArmaPizza');
Route::resource('pizzas', 'PizzasController');

// TablasSushi
Route::get('/tabla_sushis/list','TablaSushiController@list');
Route::resource('tabla_sushis', 'TablaSushiController');
// Sushi
Route::get('/sushis/list','SushisController@list');
Route::resource('sushis', 'SushisController');

// Ingredientes
Route::get('/ingredientes/disponibles','IngredientesController@disponibleAll');
Route::get('/ingredientes/nodisponibles','IngredientesController@notDisponibleAll');
Route::get('/ingredientes/{cod_ingrediente}/restore','IngredientesController@restore');
Route::resource('ingredientes', 'IngredientesController');

// Usuario
Route::get('/login',['as'=>'login','uses'=>'LoginController@login']);
Route::post('/login','LoginController@autenticar');
Route::get('/logout','LoginController@logout');
Route::get('/usuarios/ver','UsuariosController@ver');
Route::resource('usuarios', 'UsuariosController');

// Tamaños
Route::get('/pizza_tamanos/disponibles','TamanosController@disponibleAll');
Route::get('/pizza_tamanos/nodisponibles','TamanosController@notDisponibleAll');
Route::get('/pizza_tamanos/{cod_ingrediente}/restore','TamanosController@restore');
Route::resource('pizza_tamanos', 'TamanosController');

//Cart
Route::get('/cart/content','CartController@content');
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('cart.store');
Route::patch('/cart/{id}','CartController@update')->name('cart.update');
Route::delete('/cart/{id}','CartController@destroy')->name('cart.destroy');
Route::get('empty', function () {
    Cart::destroy();
});

//MetodosPago
Route::get('/metodo/{id_metodo}/restore','MetodoPagoController@restore');

Route::resource('metodo', 'MetodoPagoController');

//Pedidos
Route::get('/pedido/generar', 'PedidosController@generarPedido');
Route::patch('/pedido/{cod_pedido}','PedidosController@update')->name('pedido.update');
Route::get('/pedidos/completados', 'PedidosController@pedidosCompletados')->name('pedidos.completados');
Route::resource('pedidos', 'PedidosController');

//Agregado
Route::get('/agregado/list','AgregadoController@list');
Route::get('/agregado/{cod_agre}/restore','AgregadoController@restore');
Route::resource('agregado', 'AgregadoController');

//Ventas
Route::resource('ventas', 'VentaController');
