@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
  <div class="col">
    <h2>Agregar nuevo ingrediente</h2>
    <hr />
  </div>
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
<div class="row">
  <div class="col-6">
    {{ Form::open(array('url'=>'ingredientes')) }}
    <div class="form-group">
      <label for="nombre">Nombre ingrediente</label>
      <input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre')}}">
    </div>
    <div class="form-group">
      <label for="precio">Precio</label>
      <input type="number" id="precio" name="precio" class="form-control" value="{{old('precio')}}" min="1">
    </div>
    <div class="form-group">
      <label for="categoria">Categoría</label>
      <select class="form-control" name="categoria">
        <option value="0" selected>Seleccione</option>
        <option value="C">Carne</option>
        <option value="V">Vegetal</option>
        <option value="O">Otro</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Agregar ingrediente</button>
      <button type="reset" class="btn btn-outline-dark">Restablecer</button>
      <a href="/ingredientes" class="btn btn-outline-info">Volver</a>
    </div>
    {{ Form::close() }}
  </div>
</div>
@endsection