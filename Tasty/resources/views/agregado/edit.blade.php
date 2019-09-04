@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Editar Promocion</h2>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col-6">
        {{ Form::open(array('url'=>'agregado/'.$agregado->cod_agre,'method'=>'PATCH', 'files' => true)) }}
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{$agregado->nom_agre}}">
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" value="{{$agregado->precio}}">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea type="number" id="descripcion" name="descripcion" class="form-control" rows="4" cols="20"
                style="resize: none;">{{$agregado->descripcion}}</textarea>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="form-control" value="">
        </div>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select class="form-control" name="tipo">
                <option @if ($agregado->tio=='P')selected @endif value="P">Promoción</option>
                <option @if ($agregado->tipo=='A')selected @endif value="A">Agregado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sugerido">Sugerido</label>
            <input type="checkbox" value="1" @if ($agregado->sugerido==1)
            checked
            @endif name="sugerido" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="reset" class="btn btn-outline-dark">Restablecer</button>
            <a href="/agregado/list" class="btn btn-outline-info">Volver</a>
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
    <div class="col-md-6">
            <img class="img-thumbnail border" height="800" width="600" alt="{{$agregado->nombre}}" src="{{$agregado->imagen}}"
                title="{{$agregado->nombre}}" />
        </div>
</div>
@endsection