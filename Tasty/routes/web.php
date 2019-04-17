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
Route::resource('tabla_sushis', 'TablaSushiController');
// Sushi
Route::resource('sushis', 'SushisController');

// Ingredientes
Route::get('/ingredientes/disponibles','IngredientesController@disponibleAll');
Route::get('/ingredientes/nodisponibles','IngredientesController@notDisponibleAll');
Route::get('/ingredientes/{cod_ingrediente}/restore','IngredientesController@restore');
Route::resource('ingredientes', 'IngredientesController');

//Usuario
Route::get('/login',['as'=>'login','uses'=>'LoginController@login']);
Route::post('/login','LoginController@autenticar');
Route::get('/logout','LoginController@logout');
Route::resource('usuarios', 'UsuariosController');


Route::get('/add-to-cart/{cod_pizza}','PizzasController@getAddToCart');