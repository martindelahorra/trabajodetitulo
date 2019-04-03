@extends('layouts.master')

@section('contenido')
<div class="row">
    <div class="col">
        <h3 class='text-center'>Arma tu Pizza</h3>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">Arma tu Pizza</div>
            <div class="card-body">
                <div>
                    <label for="tamano">Tamaño: </label>
                </div>
                <div class="form-group">
                    <input type="radio" name="tamano"> Mediana
                    <input type="radio" name="tamano"> Familiar
                </div>
                <hr>
                @foreach($ingredientes as $ing)
                <div class="form-group">
                    <input type="checkbox" value="{{$ing->nombre}}" />{{$ing->nombre}}
                </div>
                @endforeach
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