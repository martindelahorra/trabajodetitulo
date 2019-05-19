<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\Ingrediente;
use App\PizzaTamano;
use Illuminate\Http\Request;

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
        $pizzas = PizzaTamano::all();
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
            $tamaños = PizzaTamano::all();
            foreach ($tamaños as $tam) {
                if ($tamano == substr($tam->nombre, 0, 2)) {
                    $tamano=$tam;
                }
            }
            $ingredientes = Ingrediente::all();
            return view('pizzas.createTest', compact('ingredientes', 'tamano'));
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
        //
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
}
