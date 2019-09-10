<?php

namespace App\Http\Controllers;

use App\TablaSushi;
use App\TsushiSushi;
use App\Sushi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TablaSushiRequest;
use App\Http\Requests\TablaSushiEditRequest;


class TablaSushiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $inter = TsushiSushi::has('sushi')->get();
        $tabla_sushi = TablaSushi::all();
        return view('tabla_sushi.index', compact('tabla_sushi', 'inter'));
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
        $sushi = Sushi::all();

        return view('tabla_sushi.create', compact('sushi'));
    }
    public function list()
    {
        if(Auth::user()->rol != 'administrador'){
            return redirect('/');
          }
        $tabla_sushi = TablaSushi::all();
        return view('tabla_sushi.list', compact('tabla_sushi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TablaSushiRequest $request)
    {
        $tabla = new TablaSushi();
        $tabla->nombre = $request->nombre;
        $tabla->precio = $request->precio;
        $roll = $request->except(['_token', 'nombre', 'precio', '_method', 'imagen']);
        
        if (empty($roll)) {
           return redirect('/tabla_sushis/create')->withErrors('Debe seleccionar al menos 1 Roll');
        }
        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('image', $request->file('imagen'));
            $tabla->fill(['imagen' => asset($path)])->save();
        }
        $tabla->save();
        

        foreach ($roll as $r) {
            TsushiSushi::create([
                'cod_tabla' => $tabla->cod_tabla,
                'cod_sushi' => $r
            ]);
        }
        return redirect('/tabla_sushis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TablaSushi  $tablaSushi
     * @return \Illuminate\Http\Response
     */
    public function show(TablaSushi $tablaSushi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TablaSushi  $tablaSushi
     * @return \Illuminate\Http\Response
     */
    public function edit($tabla)
    {
        if(Auth::user()->rol != 'administrador'){
            return redirect('/');
          }
        $tabla = TablaSushi::find($tabla);
        $sushi = Sushi::all();
        $tsushi = TsushiSushi::where('cod_tabla', $tabla->cod_tabla)->get();
        $aux = array(count($tsushi));
        foreach ($tsushi as $index => $t)
            $aux[$index] = $t->cod_sushi;
        return view('tabla_sushi.edit', compact('tabla', 'sushi', 'aux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TablaSushi  $tablaSushi
     * @return \Illuminate\Http\Response
     */
    public function update(TablaSushiEditRequest $request,  $tabla)
    {
        $tabla = TablaSushi::find($tabla);
        $tabla->nombre = $request->nombre;
        $tabla->precio = $request->precio;
        $count = 1;
        $aux = str_replace('http://localhost:8000/','',$tabla->imagen, $count);
        $roll = $request->except(['_token', 'nombre', 'precio', '_method', 'imagen']);
        
        if (empty($roll)) {
           return redirect('/tabla_sushis/'.$tabla->cod_tabla.'/edit')->withErrors('Debe seleccionar al menos 1 Roll');
        }
        if ($request->file('imagen')) {
            //eliminar imagen anterior del producto
            Storage::disk('public')->delete($aux);
            //inserción de la imagen nueva
            $path = Storage::disk('public')->put('image', $request->file('imagen'));
            $tabla->fill(['imagen' => asset($path)])->save();
        }
        $tabla->save();

        $f = TsushiSushi::where('cod_tabla', $tabla->cod_tabla)->first();
        while (!is_null($f)) {
            $f->delete();
            $f = TsushiSushi::where('cod_tabla', $tabla->cod_tabla)->first();
        }

        $roll = $request->except(['_token', 'nombre', 'precio', '_method','imagen']);
        foreach ($roll as $r) {

            TsushiSushi::create([
                'cod_tabla' => $tabla->cod_tabla,
                'cod_sushi' => $r
            ]);
        }

        return redirect('/tabla_sushis/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TablaSushi  $tablaSushi
     * @return \Illuminate\Http\Response
     */
    public function destroy(TablaSushi $tablaSushi)
    {        
        TablaSushi::destroy($tablaSushi->cod_tabla);
        alert()->info('Producto borrado con exito', '');
        return redirect('/tabla_sushis/list');
    }
}
