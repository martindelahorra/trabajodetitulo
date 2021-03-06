<?php

namespace App\Http\Controllers;

use App\MetodoPago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MetodoPagoController extends Controller
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
        $metodos = MetodoPago::withTrashed()->get()->sortBy('nombre_metodo');
        return view('metodos.index', compact('metodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\MetodoPago  $metodoPago
     * @return \Illuminate\Http\Response
     */
    public function show(MetodoPago $metodoPago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MetodoPago  $metodoPago
     * @return \Illuminate\Http\Response
     */
    public function edit(MetodoPago $metodoPago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MetodoPago  $metodoPago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetodoPago $metodoPago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MetodoPago  $metodoPago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_metodo)
    {
        
        MetodoPago::destroy($id_metodo);
        return redirect('/metodo');
    }
    public function restore($id_metodo)
    {
        $id_metodo = MetodoPago::onlyTrashed()->where('id_metodo', $id_metodo);
        $id_metodo->restore();
        return redirect('/metodo');
    }
    
}
