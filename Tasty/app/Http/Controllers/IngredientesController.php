<?php

namespace App\Http\Controllers;

use App\Ingrediente;
use Illuminate\Http\Request;

class IngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredientes = Ingrediente::withTrashed()->get();
        return view('ingredientes.index', compact('ingredientes'));
    }

    public function disponibleAll()
    {
        $ingredientes = Ingrediente::withTrashed()->get();
        foreach ($ingredientes as $ing)
            $ing->restore();
        return redirect('/ingredientes');        
    }

    public function notDisponibleAll()
    {
        $ingredientes = Ingrediente::withTrashed()->get();
        foreach ($ingredientes as $ing)
            $ing->delete();
        return redirect('/ingredientes');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingrediente = request(['nombre', 'precio', 'categoria']);
        Ingrediente::create($ingrediente);
        return redirect('/ingredientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function show(Ingrediente $ingrediente)
    {
        //No se usa
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingrediente $ingrediente)
    {
        $ingrediente = Ingrediente::find($ingrediente->cod_ingrediente);
        return view('ingredientes.edit', compact('ingrediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingrediente $ingrediente)
    {
        $ingrediente->update(request(['nombre', 'precio', 'categoria']));
        return redirect('/ingredientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingrediente $ingrediente)
    {
        Ingrediente::destroy($ingrediente->cod_ingrediente);
        return redirect('/ingredientes');
    }

    public function restore($cod_ingrediente)
    {
        $ingrediente = Ingrediente::onlyTrashed()->where('cod_ingrediente', $cod_ingrediente);
        $ingrediente->restore();
        return redirect('/ingredientes');
    }
}
