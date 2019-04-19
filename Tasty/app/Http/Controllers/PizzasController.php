<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\Ingrediente;
use App\PizzaIngrediente;
use Illuminate\Http\Request;
use App\Cart;
use Session;
use function Psy\info;

class PizzasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return view('pizzas.index', compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ArmaPizza($tamano)
    {
        if ($tamano == 'Me' or $tamano == 'Fa') {
            // $primero = Ingrediente::where('disponible','0')->first();
            $ingredientes = Ingrediente::all();
            return view('pizzas.create', compact('ingredientes', 'tamano'));
        } else {
            return redirect('/pizzas');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredientes = Ingrediente::all();
        $array = array();
        foreach($ingredientes as $key => $ing)
            $array = array_add($array, $key+1, $ing->nombre);
        // dd($array);
        // El arreglo contiene todos los nombres de los ingredientes disponibles
        // $request->$a se rescata el codigo de los ingredientes seleccionados
        $regpizza = new Pizza();
        $regpizza->tamaño = $request->tamano;
        $regpizza->precio = ($request->tamano=='Me')?6500:7900; //revisar como hacer para futuros cambios de precio
        $regpizza->save();
        // se crea la pizza con el precio actual y luego se usa su Codigo para asignarle los ingredientes
        foreach($array as $a)
            if(!empty(Ingrediente::find($request->$a))){
                $registro = new PizzaIngrediente();
                $registro->cod_pizza = $regpizza->cod_pizza;
                $registro->cod_ingrediente = $request->$a;
                $registro->save();
            }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function show(Pizza $pizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function edit(Pizza $pizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pizza $pizza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pizza  $pizza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pizza $pizza)
    {
        //
    }
    public function getAddToCart(Request $request, $id)
    {
        $pizza = Pizza::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($pizza, $pizza->id);

        $request->session()->put('cart', $cart);
        dd($request->session()->put('cart'));
        return redirect()->route('pizza.index');
    }
}
