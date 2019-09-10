<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Agregado;
use App\Bebida;
use App\Ingrediente;
use App\PizzaTamano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AgregadoRequest;


class AgregadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()

    {
        //sacar el except
        $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
        $agregados = Agregado::all();
        return view('agregado.index', compact('agregados'));
    }

    public function list()
    {
        if (Auth::User()->rol != 'administrador') {
            return redirect('/');
        }
        $agregados = Agregado::withTrashed()->get();
        return view('agregado.list', compact('agregados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        if (Auth::user()->rol != 'administrador') {
            return redirect('/');
        }
        $tamaño = PizzaTamano::all();
        $bebidas = Bebida::select('tamaño')->distinct()->get();
        return view('agregado.create', compact('tamaño', 'bebidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgregadoRequest $request)
    {
        if (empty($request->sugerido)) {
            $request->sugerido = 0;
        }
        $agre = new Agregado();
        if ($request->tipo == "B" || $request->incluye == 1) {
            $agre->bebida_litros = $request->bebida;
        } else {
            $agre->bebida_litros = null;
        }
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
        $ingredientes = Ingrediente::all();
        if ($agregado->tipo == "P") {
            return view('agregado.ingre', compact('ingredientes', 'agregado'));
        } else {
            if ($agregado->tipo == "B") {
                dd('soy una bebida');
            } else {
                return redirect('/agregado');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agregado  $agregado
     * @return \Illuminate\Http\Response
     */
    public function edit($agregado)
    {
        if (Auth::user()->rol != 'administrador') {
            return redirect('/');
        }
        $agregado=Agregado::withTrashed()->get()->find($agregado);
        $tamaño = PizzaTamano::all();
        return view('agregado.edit', compact('tamaño', 'agregado'));
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
        if (empty($request->sugerido)) {
            $request->sugerido = 0;
        }
        $agregado->nom_agre = $request->nombre;
        $agregado->precio = $request->precio;
        $agregado->descripcion = $request->descripcion;
        $agregado->tipo = $request->tipo;
        $agregado->sugerido = $request->sugerido;

        $count = 1;
        $aux = str_replace('http://localhost:8000/', '', $agregado->imagen, $count);
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
        Agregado::destroy($agregado->cod_agre);
        return redirect('/agregado/list');
    }

    public function restore($cod_agre)
    {
        $agregado = Agregado::onlyTrashed()->where('cod_agre', $cod_agre);
        $agregado->restore();
        return redirect('/agregado/list');
    }
}
