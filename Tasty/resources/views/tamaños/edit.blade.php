@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Editar tamaño: {{ $tamaño->nombre }}</h2>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col-6">
        {{ Form::open(array('url'=>'pizza_tamanos/'.$tamaño->cod_tamaño,'method'=>'PATCH','files'=>'true')) }}
        <div class="form-group">
            <label for="nombre">Nombre tamaño</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{$tamaño->nombre}}">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" value="{{$tamaño->precio}}">
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" class="form-control" name="imagen">
          </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar tamaño</button>
            <button type="reset" class="btn btn-outline-dark">Restablecer</button>
            <a href="/pizza_tamanos" class="btn btn-outline-info">Volver</a>
        </div>
        {{ Form::close() }}
    </div>
    <div class="col-md-6">
      <img class="img-thumbnail border" height="800" width="600" alt="{{$tamaño->nombre}}" src="{{$tamaño->imagen}}" title="{{$tamaño->nombre}}"/>
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