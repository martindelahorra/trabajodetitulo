<?php

namespace App\Http\Controllers;

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
        return view('agregado.list',compact('agregados'));
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
        //
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
        //
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
        //
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
