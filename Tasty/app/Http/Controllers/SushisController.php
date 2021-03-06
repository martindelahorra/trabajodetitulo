<?php

namespace App\Http\Controllers;

use App\Sushi;
use Carbon\Carbon;
use App\TablaSushi;
use App\TsushiSushi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SushiRequest;
use App\Http\Requests\SushiEditRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class SushisController extends Controller
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
        $sushis = Sushi::all();
        return view('sushis.index', compact('sushis'));
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
        return view('sushis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SushiRequest $request)
    {
        $sushi = new Sushi();
        $sushi->envoltura = $request->envoltura;
        $sushi->descripcion = $request->descripcion;
        $sushi->cortes = $request->cortes;
        $sushi->precio = $request->precio;

        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('image', $request->file('imagen'));
            $sushi->fill(['imagen' => asset($path)])->save();
        }
        $sushi->save();
        return redirect('/sushis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sushi  $sushi
     * @return \Illuminate\Http\Response
     */
    public function show(Sushi $sushi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sushi  $sushi
     * @return \Illuminate\Http\Response
     */
    public function edit(Sushi $sushi)
    {
        if (Auth::user()->rol != 'administrador') {
            return redirect('/');
        }
        return view('sushis.edit', compact('sushi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sushi  $sushi
     * @return \Illuminate\Http\Response
     */
    public function update(SushiEditRequest $request,  $sushi)
    {

        $sushi = Sushi::find($sushi);
        $sushi->envoltura = $request->envoltura;
        $sushi->descripcion = $request->descripcion;
        $sushi->cortes = $request->cortes;
        $sushi->precio = $request->precio;

        $count = 1;
        $aux = str_replace('http://localhost:8000/', '', $sushi->imagen, $count);
        if ($request->file('imagen')) {
            //eliminar imagen anterior del producto
            Storage::disk('public')->delete($aux);
            //inserción de la imagen nueva
            $path = Storage::disk('public')->put('image', $request->file('imagen'));
            $sushi->fill(['imagen' => asset($path)])->save();
        }

        $sushi->save();
        return redirect('/sushis');
    }

    public function list()
    {
        if (Auth::user()->rol != 'administrador') {
            return redirect('/');
        }
        $sushi = Sushi::all();
        return view('sushis.list', compact('sushi'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sushi  $sushi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sushi $sushi)
    {

        $rollEntabla = TsushiSushi::where('cod_sushi', $sushi->cod_sushi)->get();


        if ($rollEntabla->isEmpty()) {
            Sushi::destroy($sushi->cod_sushi);
            alert()->info('Producto borrado con exito', '');
            return redirect('/sushis/list');
        } else {
            $nombreTabla = '';
            foreach ($rollEntabla as $re) {
                $nombre = TablaSushi::where('cod_tabla', $re->cod_tabla)->value('nombre');
                $nombreTabla = $nombreTabla.$nombre.", ";
                
            }
            $nombreTabla = substr($nombreTabla, 0, -2);
            return redirect('/sushis/list')->withErrors($nombreTabla );
            
            
        }
        
    }
}
