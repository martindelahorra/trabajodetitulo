<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Agregado;
use Illuminate\Http\Request;

class AgregadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $agregados = Agregado::all();
        return view('agregado.index',compact('agregados'));
    }

    public function list(){
        $agregados = Agregado::all();
        return view('agregado.list',compact('agregados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->sugerido)){
            $request->sugerido = 0;
        }
        $agre = new Agregado();
        $agre->nom_agre = $request->nombre;
        $agre->precio = $request->precio;
        $agre->descripcion = $request->descripcion;
        $agre->tipo = $request->tipo;
        $agre->sugerido = $request->sugerido;
        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('image', $request->file('imagen'));
            $agre->fill(['imagen' => asset($path)])->save();
        }
        $agre->save();
        return redirect('/agregado/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agregado  $agregado
     * @return \Illuminate\Http\Response
     */
    public function show(Agregado $agregado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agregado  $agregado
     * @return \Illuminate\Http\Response
     */
    public function edit(Agregado $agregado)
    {
        //dd($agregado);
        return view('agregado.edit',compact('agregado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agregado  $agregado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agregado $agregado)
    {
        if(empty($request->sugerido)){
            $request->sugerido = 0;
        }
        $agregado->nom_agre = $request->nombre;
        $agregado->precio = $request->precio;
        $agregado->descripcion = $request->descripcion;
        $agregado->tipo = $request->tipo;
        $agregado->sugerido = $request->sugerido;
        $count = 1;
        $aux = str_replace('http://localhost:8000/','',$agregado->imagen, $count);
        if ($request->file('imagen')) {
            //eliminar imagen anterior del producto
            Storage::disk('public')->delete($aux);            
            //inserción de la imagen nueva
            $path = Storage::disk('public')->put('image', $request->file('imagen'));
            $agregado->fill(['imagen' => asset($path)])->save();
        }
        $agregado->save();
        return redirect('/agregado/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agregado  $agregado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agregado $agregado)
    {
        //
    }
}
