@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Editar ingrediente: {{$ingrediente->nombre}}</h2>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-6">
    {{ Form::open(array('url'=>'ingredientes/'.$ingrediente->cod_ingrediente,'method'=>'PATCH')) }}
        <div class="form-group">
            <label for="nombre">Nombre ingrediente</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{$ingrediente->nombre}}">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" value="{{$ingrediente->precio}}">
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <select class="form-control" name="categoria">
                <option value="C"@if($ingrediente->categoria=='C') selected @endif>Carne</option>
                <option value="V"@if($ingrediente->categoria=='V') selected @endif>Vegetal</option>
                <option value="O"@if($ingrediente->categoria=='O') selected @endif>Otro</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="/ingredientes" class="btn btn-outline-info">Volver</a>
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