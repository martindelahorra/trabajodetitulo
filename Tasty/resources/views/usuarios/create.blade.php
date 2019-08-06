@extends('layouts.master')

@section('contenido')
<hr>
<div class="row mt-3">
  <div class="col">
    <h2>Usuarios</h2>
    <hr>
  </div>
</div>

<div class="row">
  <div class="col col-md-6">
    <div class="card">
      <div class="card-header">Agregar Usuario</div>
      <div class="card-body">
        {{Form::open(array('url'=>'usuarios')) }}
        <input type="hidden" name="rol" value="cliente">
        <div class="form-group">
          <label for="username">Nombre de usuario</label>
          <input type="text" name="username" class="form-control" value="{{old('username')}}">
        </div>
        <div class="form-group">
          <label for="nombre_completo">Nombre completo</label>
          <input type="text" name="nombre_completo" class="form-control" value="{{old('nombre_completo')}}">
        </div>
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="text" name="telefono" class="form-control" value="{{old('telefono')}}">
        </div>
        <div class="form-group">
          <label for="direccion">Direccion</label>
          <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}">
        </div>
        <div class="form-group">
          <label for="rut">RUT</label>
          <input type="text" name="rut" class="form-control" value="{{old('rut')}}">
          <p>Ej: 199584367</p>
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" name="password" class="form-control" value="{{old('password')}}">
        </div>
        <div class="form-group">
          <label for="password_confirmation">Repetir Contraseña</label>
          <input type="password" name="password_confirmation" class="form-control"
            value="{{old('password_confirmation')}}">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-secondary">Registrarse</button>
        </div>
        {{Form::close()}}
      </div>
    </div>

  </div>
  @if($errors->any())
  <div class="col col-md-4">
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  </div>
  @endif
</div>


@endsection