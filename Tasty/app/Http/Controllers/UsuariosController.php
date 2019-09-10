<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsuariosEditRequest;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $usuario = new Usuario();
        $value = str_replace("-","",$request->rut);
        $value = str_replace(".","",$value);
        //$usuario = request(['username', 'nombre_completo', 'rol', 'telefono', 'direccion']);
        $usuario->username = $request->username;
        $usuario->nombre_completo = $request->nombre_completo;
        $usuario->rut = $value;
        $usuario->rol = 'cliente';
        $usuario->telefono = $request->telefono;
        $usuario->direccion = $request->direccion;
        $usuario['password'] = Hash::make($request->password);
        $usuario->save();
        //Usuario::create($usuario);
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id_usuario)
    { }
    public function ver()
    {
        return view('usuarios.ver');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UsuariosEditRequest $request, Usuario $usuario)
    {
        $usuario->update(request(['username', 'nombre_completo', 'telefono', 'direccion', 'rut']));
        return redirect('usuarios/ver')->with('success_message', 'Datos guardados con éxito! :)');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
