<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Usuario;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\TablaSushi;
use App\Pizza;
use App\Ingrediente;
use App\PizzaIngrediente;
use App\PizzaTamano;
use Illuminate\Support\Facades\Auth;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
  {
    $this->middleware('auth')->except(['create']);
  }
    public function index()

    {
        
        if (Auth::User()->rol=='administrador'){
            
        $tamanos = PizzaTamano::all();
        return view('pedidos.index');
        // return view('pedidos.index', compact('usuario','tamanos'));
        }else{
            Cart::destroy();
            return view('pedidos.index')->with('msg','Su Pedido fue generado con exito');;
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedidos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function generarPedido()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
