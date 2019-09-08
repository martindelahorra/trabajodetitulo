<?php

namespace App\Http\Controllers;

use App\Agre_ingrediente;
use App\Agregado;
use App\Bebida;
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
        $tamanos = PizzaTamano::all();
        $bebidas = Bebida::all();
        return view('cart.index', compact('tamanos', 'bebidas'));
    }
    public function content()
    {
        dd(cart::content());
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
        // dd($request->tipo);
        if ($request->tipo == 'tabla') {
            $tipo = 'App\TablaSushi';
            Cart::add($request->id, $request->nombre, 1, $request->precio)->associate($tipo);
            return redirect()->route('cart.index')->with('success_message', 'Producto agregado al carrito! :)');
        } elseif ($request->tipo == 'pizza') {
            $ing = $request->except(['_token', 'tamano', 'nombre', 'precio', 'tipo']);
            if (empty($ing)) {
                return redirect('/pizzas')->withErrors('Debe seleccionar al menos 1 ingrediente');
            }
            // Se define el modelo para asociar
            $tipo = 'App\Pizza';
            // se crea la pizza
            $regpizza = new Pizza();
            $regpizza->cod_tamaño = $request->tamano;
            //Se asigna el precio a la pizza desde la tabla PizzaTamano
            $regpizza->precio = PizzaTamano::find($request->tamano)->value('precio');
            $ing = $request->except(['_token', 'tamano', 'nombre', 'precio', 'tipo']);
            // El arreglo $ing contiene los ingredientes seleccionados
            // Por cada ingrediente llamado como $i se crea un nuevo registro en PizzaIngrediente
            // Se calcula el valor adicional para la pizza x ing
            $value = 0;
            $precio_add = 0;
            foreach ($ing as $i) {
                $aux = Ingrediente::find($i);
                $value++;
                if ($value > 3) {
                    $precio_add += $aux->precio;
                }
            }
            $regpizza->precio += $precio_add;
            // Se guarda la pizza
            $regpizza->save();
            $nombre = '';
            $value = 0;
            foreach ($ing as $i) {
                $aux = Ingrediente::find($i);
                $nombre .= ($aux->nombre) . ', ';
                $registro = new PizzaIngrediente();
                $registro->cod_pizza = $regpizza->cod_pizza;
                $registro->cod_ingrediente = $i;
                $registro->save();
                $value++;
                if ($value > 3) {
                    $precio_add += $aux->precio;
                }
            }
            $nombre = substr($nombre, 0, -2);
            Cart::add($regpizza->cod_pizza, $request->nombre . ' : ' . $nombre, 1, $regpizza->precio)->associate($tipo);
            return redirect()->route('cart.index')->with('success_message', 'Producto agregado al carrito! :)');
        } elseif ($request->tipo == 'sushi') {
            $tipo = 'App\Sushi';
            Cart::add($request->id, $request->nombre, 1, $request->precio)->associate($tipo);
            return redirect()->route('cart.index')->with('success_message', 'Producto agregado al carrito! :)');
        } elseif ($request->tipo == "promo pizza") {
            $tipo = 'App\Agregado';
            $agre = Agregado::find($request->cod_agregado);
            if ($agre->tipo == "P") {
                // se rescatan los codigos de los ingredientes en $ing en caso de ser una promoción de pizza
                $ing = $request->except(['_token', 'cod_agregado', 'tipo']);
                $agre = Agregado::find($request->cod_agregado);
                $nombre = '';
                foreach ($ing as $i) {
                    $aux = Ingrediente::find($i);
                    $nombre .= ($aux->nombre) . ', ';
                }
                // Se calcula el valor adicional para la pizza x ing
                $value = 0;
                $precio_add = 0;
                foreach ($ing as $i) {
                    $aux = Ingrediente::find($i);
                    $value++;
                    if ($value > 3) {
                        $precio_add += $aux->precio;
                    }
                }
                $nombre = substr($nombre, 0, -2);

                $precio = ($agre->precio + $precio_add);
                Cart::add($agre->cod_agre, $agre->nom_agre, 1, $precio, ['ingredientes' => $nombre, 'bebida' => $agre->bebida_l])->associate($tipo);
                return redirect()->route('cart.index')->with('success_message', 'Producto agregado al carrito! :)');
            } else {
                return redirect('/');
            }
        } else if ($request->tipo == "bebida") {
            $tipo = 'App\Agregado';
            $agre = Agregado::find($request->id);
            if ($agre->tipo == "B") { 
                Cart::add($agre->cod_agre, $agre->nom_agre, 1, $agre->precio, ['bebida' => $agre->bebida_l])->associate($tipo);
                return redirect()->route('cart.index')->with('success_message', 'Producto agregado al carrito! :)');
            } else {
                return redirect('/');
            }
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
        if (!empty($request->bebida)) {
            $item = Cart::get($id);
            Cart::update($id, ['options' => ['ingredientes' => $item->options->ingredientes, 'bebida' => $item->options->bebida,'sabor'=>$request->bebida]]);
            return redirect('/cart');
        } elseif (!empty($request->quantity)) {
            Cart::update($id, $request->quantity);
            session()->flash('success_message', 'Cantidad actualizada! :)');
            return response()->json(['success' => true]);
        } else {
            return redirect('/cart');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Cart::get($id);
        Cart::remove($id);
        if ($item->model->primaryKey == 'cod_pizza') {
            $aux = PizzaIngrediente::where('cod_pizza', $item->id)->first();
            while (!empty($aux)) {
                $aux->delete();
                $aux = PizzaIngrediente::where('cod_pizza', $item->id)->first();
            }
            Pizza::destroy($item->id);
        }
        return back()->with('success_message', 'El producto fue quitado.');
    }
}
