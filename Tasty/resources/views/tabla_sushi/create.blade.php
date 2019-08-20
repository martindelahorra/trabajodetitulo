@extends('layouts.master') 
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Agregar nuevo Roll</h2>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col-6">
        {{ Form::open(array('url'=>'tabla_sushis', 'files' => true)) }}
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre')}}">
        </div>
        
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" value="{{old('precio')}}">
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="form-control" value="{{old('imagen')}}">
        </div>
        @foreach($sushi as $s)
        <div class="form-group">
            <input type="checkbox" value="{{$s->cod_sushi}}" name="{{$s->cod_sushi}}" />{{$s->envoltura}}
        </div>
        @endforeach

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar Tabla</button>
            <button type="reset" class="btn btn-outline-dark">Restablecer</button>
            <a href="/tabla_sushis" class="btn btn-outline-info">Volver</a>
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