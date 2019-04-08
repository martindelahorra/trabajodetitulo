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
              <button type="button" class="btn btn-secondary">Iniciar sesión</button>
            </div>
          </div>
        </div>
       
      </div>
    </div>

   

@endsection
