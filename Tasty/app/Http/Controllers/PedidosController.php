<?php

namespace App\Http\Controllers;

use App\Pedido;
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
use App\Sushi;
use Alert;
use App\Agregado;
use App\Agregado_pedido;
use App\Bebida;
use App\TsushiSushi;
use App\Sushi_pedido;
use App\MetodoPago;

use App\Http\Requests\PedidoRequest;


class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()

    {
        //sacar el except
        $this->middleware('auth')->except(['']);
    }
    public function index()
    {

        $pedidos = Pedido::where('estado_pedido', '<>', 'C')->where('estado_pedido', '<>', 'A')->orderBy('fecha', 'desc')->get();
        $reg_p = Pizza_pedido::all();
        $reg_t = Tabla_pedido::all();
        $pizzas = Pizza::all();
        $tamanos = PizzaTamano::withTrashed()->get();
        $ingredientes = Ingrediente::withTrashed()->get();
        $reg_ing = PizzaIngrediente::all();
        $tablas = TablaSushi::withTrashed()->get();
        $tsushis = TsushiSushi::all();
        $agregados = Agregado::all();
        $sushis = Sushi::withTrashed()->get();

        if (Auth::User()->rol == 'administrador') {
            return view('pedidos.index', compact('pedidos', 'reg_p', 'reg_t', 'pizzas', 'tamanos', 'ingredientes', 'reg_ing', 'tablas', 'tsushis', 'sushis', 'agregados'));
        } else {
            Cart::destroy();
            $pedidos = Pedido::where('id_usuario', Auth::user()->id_usuario)->orderBy('fecha', 'desc')->get();
            return view('pedidos.index', compact('pedidos', 'reg_p', 'reg_t', 'pizzas', 'tamanos', 'ingredientes', 'reg_ing', 'tablas', 'tsushis', 'sushis', 'agregados'))->with('msg', 'Su Pedido fue generado con exito');;
        }
    }

    public function pedidosCompletados()
    {
        $pedidos = Pedido::where('estado_pedido', 'C')->get();
        $reg_p = Pizza_pedido::all();
        $reg_t = Tabla_pedido::all();
        $pizzas = Pizza::all();
        $tamanos = PizzaTamano::withTrashed()->get();
        $ingredientes = Ingrediente::withTrashed()->get();
        $reg_ing = PizzaIngrediente::all();
        $tablas = TablaSushi::withTrashed()->get();
        $tsushis = TsushiSushi::all();
        $sushis = Sushi::withTrashed()->get();
        if (Auth::User()->rol == 'administrador') {
            return view('pedidos.completados', compact('pedidos', 'reg_p', 'reg_t', 'pizzas', 'tamanos', 'ingredientes', 'reg_ing', 'tablas', 'tsushis', 'sushis'));
        } else {
            Cart::destroy();
            $pedidos = Pedido::where('id_usuario', Auth::user()->id_usuario)->get();
            return view('pedidos.completados', compact('pedidos', 'reg_p', 'reg_t', 'pizzas', 'tamanos', 'ingredientes', 'reg_ing', 'tablas', 'tsushis', 'sushis'))->with('msg', 'Su Pedido fue generado con exito');;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $metodo = MetodoPago::all();
        return view('pedidos.create', compact('metodo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoRequest $request)
    {
        //Insertar en pedido
        $pedido = new Pedido();
        $pedido->id_usuario = Auth::user()->id_usuario;
        $pedido->id_metodo = $request->metodo_pago;
        $pedido->estado_pedido = 'M';
        $text = '';
        foreach (Cart::content() as $item) {
            if ($item->associatedModel == "App\Agregado") {
                if ($item->model->tipo == "B") {
                    $b = Bebida::find($item->options->sabor);
                    $text = $text . $item->options->bebida . ': ' . $b->nombre . ';';
                } elseif ($item->model->tipo == "P") {
                    $b = Bebida::find($item->options->sabor);
                    $text = $text . $item->options->bebida . ': ' . $b->nombre . ';';
                    $text = $text . 'Ingredientes: ' . $item->options->ingredientes . ';';
                }
            }
        }
        $pedido->descripcion = $request->descripcion . '|' . $text;
        $pedido->direccion = $request->direccion;
        $pedido->total_pedido = Cart::total(0, ',', '');
        $pedido->fecha = Carbon::now('GMT-3');
        $pedido->telefono = $request->telefono;
        $pedido->nombre_completo = $request->nombre_completo;
        $pedido->delivery = $request->delivery;
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
            } elseif ($item->associatedModel == "App\Sushi") {
                Sushi_pedido::create([
                    'cod_pedido' => $pedido->cod_pedido,
                    'cod_sushi' => $item->model->cod_sushi,
                    'cantidad' => $item->qty
                ]);
            } elseif ($item->associatedModel == "App\Agregado") {
                Agregado_pedido::create([
                    'cod_pedido' => $pedido->cod_pedido,
                    'cod_agre' => $item->model->cod_agre,
                    'cantidad' => $item->qty
                ]);
            }
        }
        //destruir carrito
        //Cart::destroy();
        alert()->success('Pedido generado con exito!');
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
    public function update(Request $request, $cod_pedido)
    {
        //M=Espera
        //A=Cancelado
        //P=Preparación
        //E=Camino
        //C=Completado
        if ($request->estado_pedido != 'C') {
            $pedido = Pedido::find($cod_pedido);
            if ($request->estado_pedido != 'A') {
                if ($pedido->estado_pedido!='A') {
                    $pedido->estado_pedido = $request->estado_pedido;
                    $pedido->save();
                    session()->flash('success_message', 'Estado actualizado! :)');
                    return response()->json(['success' => true]);
                } else {
                    session()->flash('danger_message', 'El usuario ya cancelo su pedido');
                    return response()->json(['success' => true]);
                }
            } elseif ($request->estado_pedido == 'A' && $pedido->estado_pedido == 'M') {
                $pedido->estado_pedido = $request->estado_pedido;
                $pedido->save();
                return redirect('/pedidos')->with('warning_message', 'Pedido Cancelado');
            } else {
                return redirect('/pedidos')->with('danger_message', 'Operacion inválida');
            }
        } else {
            $pedido = Pedido::find($cod_pedido);
            $pedido->estado_pedido = $request->estado_pedido;
            $pedido->save();
            return redirect()->route('pedidos.completados')->with('success_message', 'Pedido completado');
        }
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
