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
use App\Tabla_pedido;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Pizza_pedido;
use App\Sushi_pedido;
use App\Sushi;


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

        if (Auth::User()->rol == 'administrador') {

            $tamanos = PizzaTamano::all();
            return view('pedidos.index');
            // return view('pedidos.index', compact('usuario','tamanos'));
        } else {
            Cart::destroy();
            return view('pedidos.index')->with('msg', 'Su Pedido fue generado con exito');;
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
        //Insertar en pedido

        $pedido = new Pedido();
        $pedido->id_usuario = Auth::user()->id_usuario;
        $pedido->estado_pedido = 'P';
        $pedido->descripcion = $request->descripcion;
        $pedido->direccion = $request->direccion;
        $pedido->total_pedido = Cart::total(0, ',', '');
        $pedido->fecha = Carbon::now('GMT-4');
        $pedido->telefono = $request->telefono;
        $pedido->nombre_completo = $request->nombre_completo;
        $pedido->save();
        //insertar en interseccion
        foreach (Cart::content() as $item) {
            if ($item->associatedModel == "App\Pizza") {
                Pizza_pedido::create([
                    'cod_pedido' => $pedido->cod_pedido,
                    'cod_pizza' => $item->model->cod_pizza,
                    'cantidad' => $item->qty
                ]);
            } elseif ($item->associatedModel == "App\TablaSushi") {
                Tabla_pedido::create([
                    'cod_pedido' => $pedido->cod_pedido,
                    'cod_tabla' => $item->model->cod_tabla,
                    'cantidad' => $item->qty
                ]);
            }elseif ($item->associatedModel == "App\Sushi") {
                Sushi_pedido::create([
                    'cod_pedido' => $pedido->cod_pedido,
                    'cod_sushi' => $item->model->cod_sushi,
                    'cantidad' => $item->qty
                ]);
            }
        }
        //destruir carrito
        Cart::destroy();
        return redirect('/pedidos');
    }
    public function generarPedido()
    { }

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
