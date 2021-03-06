@extends('layouts.master')

@section('contenido')
<hr>
<div class="row mt-3">
  <div class="col">
    <h1>Usuario: {{Auth::user()->username}}</h1>
    <hr>
  </div>
</div>
<div class="row">
  <div class="col col-md-6">
    @if (session()->has('success_message'))
    <div class="alert alert-success" role="alert">
      {{ session()->get('success_message') }}
    </div>
    @endif
    @if(count($errors) >0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="card">
      <div class="card-header">Detalles del usuario</div>
      <div class="card-body">
        <div class="form-group">
          {{Form::open(array('url'=>'usuarios/'.Auth::user()->id_usuario,'method'=>'PATCH')) }}
          <label for="username">Nombre de usuario</label>
          <input type="text" name="username" class="form-control" value="{{Auth::user()->username}}" readonly>
        </div>
        <div class="form-group">
          <label for="nombre_completo">Nombre completo</label>
          <input type="text" name="nombre_completo" class="form-control" value="{{Auth::user()->nombre_completo}}">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="text" name="telefono" class="form-control" value="{{Auth::user()->telefono}}">
        </div>
        <div class="form-group">
          <label for="direccion">Direccion</label>
          <input type="text" name="direccion" class="form-control" value="{{Auth::user()->direccion}}">
        </div>
        <div class="form-group">
          <label for="rut">RUT</label>
          <input type="text" name="rut" class="form-control" value="{{Auth::user()->rut}}">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-outline-primary">Editar Perfil</button>
        </div>
        {{Form::close()}}
      </div>
    </div>
  </div>

</div>
@endsection