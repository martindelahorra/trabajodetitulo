@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Agregar Promocion</h2>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col-6">
        {{ Form::open(array('url'=>'agregado', 'files' => true)) }}
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre')}}">
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" class="form-control" value="{{old('precio')}}">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea type="number" id="descripcion" name="descripcion" class="form-control"
                value="{{old('descripcion')}}" rows="4" cols="20" style="resize: none;"></textarea>
        </div>

        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="form-control" value="{{old('imagen')}}">
        </div>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select class="form-control" name="tipo" id="tipo">
                <option value="0" selected>Seleccione</option>
                <option value="A">Agregado</option>
                <option value="B">Bebida</option>
                <option value="P">Pizza</option>
                <option value="T">Tabla</option>
                <option value="S">Roll</option>
            </select>
        </div>
        <div class="form-group" hidden id="delete">
            <label for="tamaño">Tamaño</label>
            <select class="form-control" name="tamaño">
                <option value="0" selected>Seleccione</option>
                @foreach ($tamaño as $t)
                    <option value="{{$t->cod_tamaño}}">{{$t->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="sugerido">Sugerido</label>
            <input type="checkbox" value="1" name="sugerido" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar</button>
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
</div>

<script>
    $('#tipo').change(function(){
        if($('#tipo').val()=="P"){
            $("#delete").attr("hidden",false);
        }else{
            $("#delete").attr("hidden",true);
        }
});
</script>
@endsection