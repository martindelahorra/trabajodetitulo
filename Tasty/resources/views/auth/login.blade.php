@extends('layouts.master')
@section('contenido')
<div class="row mt-2">
  <div class="col">
    <h2>Inicio de sesión</h2>
    <hr>
  </div>
</div>

<div class="row mt-2">
  <div class="col col-md-6 offset-md-3">
    <div class="alert alert-info" role="alert">
      <p><i class="fas fa-user"></i> Ingrese con sus datos</p>
    </div>
    {{ Form:: open(array('url'=>'login'))}}
    <div class="card">
      <div class="card-header">Ingrese sus datos</div>
      <div class="card-body">
        <div class="form-group">
          <label for="username">Nombre de usuario</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-secondary">Iniciar sesión</button>
          <a href="/usuarios/create" class="btn btn-info derecha">Registrarse</a>
        </div>
      </div>
    </div>
    {{ Form::close()}}
  </div>
</div>

@if($errors->any())
<div class="row mt-2">
  <div class="col col-md-6 offset-md-3">
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
      <li>{{ $error}}</li>
      @endforeach
    </div>
  </div>
</div>
@endif
@endsection