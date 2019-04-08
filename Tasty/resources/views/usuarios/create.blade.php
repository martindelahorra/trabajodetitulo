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
          
          <input type="hidden"  name="rol" value="cliente">
          <div class="form-group">
            <label for="username">Nombre de usuario</label>
            <input type="text" name="username" class="form-control">
          </div>
          <div class="form-group">
            <label for="nombre_completo">Nombre completo</label>
            <input type="text" name="nombre_completo" class="form-control">
          </div>
          <div class="form-group">
            <label for="rut">RUT</label>
            <input type="text" name="rut" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
            <label for="password_confirmation">Repetir Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control">
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-secondary">Registrarse</button>
          </div>
          
        </div>
      </div>

    </div>
    
  </div>
@endsection
