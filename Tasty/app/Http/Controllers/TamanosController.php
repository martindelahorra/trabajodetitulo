<?php

namespace App\Http\Controllers;

use App\PizzaTamano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TamanosRequest;
use App\Http\Requests\TamanosEditRequest;


class TamanosController extends Controller
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
        $tamaño = PizzaTamano::withTrashed()->get();
        return view('tamaños.index', compact('tamaño'));
    }

    public function disponibleAll()
    {
        if(Auth::user()->rol != 'administrador'){
            return redirect('/');
          }
        $tamaño = PizzaTamano::withTrashed()->get();
        foreach ($tamaño as $t)
            $t->restore();
        return redirect('/pizza_tamanos');
    }

    public function notDisponibleAll()
    {
        if(Auth::user()->rol != 'administrador'){
            return redirect('/');
          }
        $tamaño = PizzaTamano::withTrashed()->get();
        foreach ($tamaño as $t)
            $t->delete();
        return redirect('/pizza_tamanos');
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
        return view('tamaños.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TamanosRequest $request)
    {
        $tamaño = new PizzaTamano();
        $tamaño->nombre = $request->nombre;
        $tamaño->precio = $request->precio;        
        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('image', $request->file('imagen'));
            $tamaño->fill(['imagen'=> asset($path)])->save();
        }
        $tamaño->save();
        return redirect('/pizzas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PizzaTamano  $pizzaTamano
     * @return \Illuminate\Http\Response
     */
    public function show(PizzaTamano $pizzaTamano)
    {
        //No se usa
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PizzaTamano  $pizzaTamano
     * @return \Illuminate\Http\Response
     */
    public function edit( $pizzaTamano)
    {
        if(Auth::user()->rol != 'administrador'){
            return redirect('/');
          }
        $tamaño = PizzaTamano::withTrashed()->get()->find($pizzaTamano);
        return view('tamaños.edit', compact('tamaño'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PizzaTamano  $pizzaTamano
     * @return \Illuminate\Http\Response
     */
    public function update(TamanosEditRequest $request,  $pizzaTamano)
    {   
        $pizzaTamano = PizzaTamano::withTrashed()->get()->find($pizzaTamano);
        $pizzaTamano->nombre = $request->nombre;
        $pizzaTamano->precio = $request->precio;
        $count = 1;
        $aux = str_replace('http://localhost:8000/','',$pizzaTamano->imagen, $count);
        if ($request->file('imagen')) {
            //eliminar imagen anterior del producto
            Storage::disk('public')->delete($aux);
            //inserción de la imagen nueva
            $path = Storage::disk('public')->put('image', $request->file('imagen'));
            $pizzaTamano->fill(['imagen'=> asset($path)])->save();
        }
        $pizzaTamano->save();
        return redirect('/pizza_tamanos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PizzaTamano  $pizzaTamano
     * @return \Illuminate\Http\Response
     */
    public function destroy(PizzaTamano $pizzaTamano)
    {
        PizzaTamano::destroy($pizzaTamano->cod_tamaño);
        return redirect('/pizza_tamanos');
    }

    public function restore($cod_tamaño)
    {
        $tamaño = PizzaTamano::onlyTrashed()->where('cod_tamaño', $cod_tamaño);
        $tamaño->restore();
        return redirect('/pizza_tamanos');
    }
}
