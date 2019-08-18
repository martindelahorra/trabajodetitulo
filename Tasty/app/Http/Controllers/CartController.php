<?php

namespace App\Http\Controllers;

use App\TablaSushi;
use App\Pizza;
use App\Ingrediente;
use App\PizzaIngrediente;
use App\PizzaTamano;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // foreach (Cart::content() as $item) {
        //     $item->model->primaryKey; cod_tabla o cod_pizza
        // }

        //dd(Cart::content());
        $tamanos = PizzaTamano::all();
        return view('cart.index', compact('tamanos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->tipo == 'tabla') {
            $tipo = 'App\TablaSushi';
            Cart::add($request->id, $request->nombre, 1, $request->precio)->associate($tipo);
            return redirect()->route('cart.index')->with('success_message', 'Producto agregado al carrito! :)');

        }  elseif ($request->tipo == 'pizza') {
            // Se define el modelo para asociar
            $tipo = 'App\Pizza';
            // se crea la pizza
            $regpizza = new Pizza();
            $regpizza->tamaño = $request->tamano;
            $tamaños = PizzaTamano::all();
            // Se obtiene el precio en base al tamaño de la pizza
            foreach ($tamaños as $tam) {
                if ($request->tamano == substr($tam->nombre, 0, 2)) {
                    $regpizza->precio = $tam->precio;
                }
            }
            // Se guarda la pizza
            $regpizza->save();
            $ing = $request->except(['_token', 'tamano','nombre','precio','tipo']);
            // El arreglo $ing contiene los ingredientes seleccionados
            // Por cada ingrediente llamado como $i se crea un nuevo registro en PizzaIngrediente
            $nombre ='';
            $value=0;
            foreach ($ing as $i) {
                if($value<=3){
                    $aux = Ingrediente::find($i);
                    $nombre .= ($aux->nombre).', ';
                }
                $registro = new PizzaIngrediente();
                $registro->cod_pizza = $regpizza->cod_pizza;
                $registro->cod_ingrediente = $i;
                $registro->save();
                $value++;
            }
            $nombre = substr($nombre,0,-2);
            Cart::add($regpizza->cod_pizza, $request->nombre.' : '.$nombre, 1, $request->precio)->associate($tipo);
            return redirect()->route('cart.index')->with('success_message', 'Producto agregado al carrito! :)');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         Cart::update($id, $request->quantity);
         session()->flash('success_message', 'Cantidad actualizada! :)');
         return response()->json(['success' => true]);

        
        //return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success_message', 'El producto fue quitado.');
    }
}
