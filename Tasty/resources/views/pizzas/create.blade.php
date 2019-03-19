@extends('layouts.master')

@section('contenido')
<div class="row">
    <div class="col">
        <h3 class='text-center'>Agregar Pizza</h3>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">Agregar Pizza</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}">
                </div>
                <div class="form-group">
                    <label for="precio">Precio: </label>
                    <input type="text" name="precio" class="form-control" value="{{old('precio')}}">
                </div>
                <div>
                    <label for="tamano">Tamaño: </label>
                </div>
                <div class="form-group">
                    <input type="radio" name="tamano"> Pequeño
                    <input type="radio" name="tamano"> Mediano
                    <input type="radio" name="tamano"> Grande
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción: </label>
                    <textarea class="form-control" name="descripcion" rows="5" style="resize:none">{{old('descripcion')}}</textarea>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-success">Agregar Pizza</button>
                    <button type="reset" class="btn btn-outline-dark">Restablecer</button>
                    <a href="/" class="btn btn-info">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection 