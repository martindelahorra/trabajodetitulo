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
<<<<<<< HEAD
Route::get('/pizzas/crear',function(){
    return view ('pizzas/create');
});

Route::resource('pizzas', 'PizzasController');

Route::resource('sushis', 'SushisController');
=======
Route::resource('pizzas', 'PizzasController');
Route::resource('ingredientes', 'IngredientesController');
>>>>>>> 15af8430a222ad4e5ec1b61619acebec5349d1ad
