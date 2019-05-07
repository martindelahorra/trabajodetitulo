@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Agregar nuevo tamaño</h2>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col-6">
        {{ Form::open(array('url'=>'pizza_tamanos','files'=>'true')) }}
        <div class="form-group">
            <label for="nombre">Nombre tamaño</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre')}}">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" value="{{old('precio')}}">
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
          </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar tamaño</button>
            <button type="reset" class="btn btn-outline-dark">Restablecer</button>
            <a href="/pizza_tamanos" class="btn btn-outline-info">Volver</a>
        </div>
        {{ Form::close() }}
    </div>
    @if($errors->any())
      <div class="col col-md-6">
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