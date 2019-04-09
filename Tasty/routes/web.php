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
Route::get('/pizzas/crear',function(){
    return view ('pizzas/create');
});

Route::resource('pizzas', 'PizzasController');

Route::resource('sushis', 'SushisController');

//Usuario
Route::get('/login',['as'=>'login','uses'=>'LoginController@login']);
Route::post('/login','LoginController@autenticar');
Route::get('/logout','LoginController@logout');
Route::resource('usuarios', 'UsuariosController');