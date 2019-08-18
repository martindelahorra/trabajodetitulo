@extends('layouts.master') 
@section('contenido')
<div class="row mt-4">
    <div class="col">
    <h2>Editar Roll: {{ $sushi->envoltura }}</h2> <p> {{ $sushi->descripcion}}</p>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col-6">
        {{ Form::open(array('url'=>'sushis', 'files' => true)) }}
        <div class="form-group">
            <label for="envoltura">Envoltura</label>
            <input type="text" id="envoltura" name="envoltura" class="form-control" value="{{ $sushi->envoltura }}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea type="number" id="descripcion" name="descripcion" class="form-control" rows="3"
                cols="20" style="resize: none;">{{$sushi->descripcion}}</textarea>
        </div>
        <div class="form-group">
            <label for="cortes">Cortes</label>
            <input type="number" id="cortes" name="cortes" class="form-control" value="{{$sushi->cortes}}">
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="form-control" value="{{old('imagen')}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar Roll</button>
            <button type="reset" class="btn btn-outline-dark">Restablecer</button>
            <a href="/sushis" class="btn btn-outline-info">Volver</a>
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
        <img class="img-thumbnail border" height="800" width="600" alt="Error: no se encontró la foto :(" src="{{$sushi->imagen}}"
            title="Nombre de la imagen xd" />
    </div>
</div>
@endsection