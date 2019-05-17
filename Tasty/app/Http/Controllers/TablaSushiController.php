<?php

namespace App\Http\Controllers;

use App\TablaSushi;
use App\TsushiSushi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TablaSushiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $inter = TsushiSushi::all();
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
        return view('tabla_sushi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tabla = new TablaSushi();
        $tabla->nombre = $request->nombre;
        $tabla->precio = $request->precio;
        
        
        if ($request->file('imagen')) {
            $path = Storage::disk('public')->put('image', $request->file('imagen'));
            $tabla->fill(['imagen'=> asset($path)])->save();
        }
        $tabla->save();
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
    public function edit(TablaSushi $tablaSushi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TablaSushi  $tablaSushi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TablaSushi $tablaSushi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TablaSushi  $tablaSushi
     * @return \Illuminate\Http\Response
     */
    public function destroy(TablaSushi $tablaSushi)
    {
        //
    }
}
