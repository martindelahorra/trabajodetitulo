<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredienteEditRequest;
use App\Http\Requests\IngredienteRequest;
use App\Ingrediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class IngredientesController extends Controller
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
        if(Auth::user()->rol != 'administrador'){
            return redirect('/');
          }
        $ingredientes = Ingrediente::withTrashed()->get()->sortBy('nombre');
        return view('ingredientes.index', compact('ingredientes'));
    }

    public function disponibleAll()
    {
        if(Auth::user()->rol != 'administrador'){
            return redirect('/');
          }
        $ingredientes = Ingrediente::withTrashed()->get();
        foreach ($ingredientes as $ing)
            $ing->restore();
        return redirect('/ingredientes');
    }

    public function notDisponibleAll()
    {
        if(Auth::user()->rol != 'administrador'){
            return redirect('/');
          }
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
        if(Auth::user()->rol != 'administrador'){
            return redirect('/');
          }
        return view('ingredientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredienteRequest $request)
    {
        if (empty(Ingrediente::where('nombre', '=', $request->nombre)->first())) {
            $ingrediente = request(['nombre', 'precio', 'categoria']);
            Ingrediente::create($ingrediente);
            return redirect('/ingredientes');
        } else {
            return redirect()->back()->withErrors(['Este ingrediente ya existe']);
        }
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
    public function edit($ingrediente)
    {
        if(Auth::user()->rol != 'administrador'){
            return redirect('/');
          }
        $ingrediente = Ingrediente::withTrashed()->get()->find($ingrediente);
        return view('ingredientes.edit', compact('ingrediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingrediente  $ingrediente
     * @return \Illuminate\Http\Response
     */
    public function update(IngredienteEditRequest $request,  $ingrediente)
    {
        $ingrediente = Ingrediente::withTrashed()->get()->find($ingrediente);
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
