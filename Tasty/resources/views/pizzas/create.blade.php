@extends('layouts.master')

@section('contenido')
<div class="row">
    <div class="col">
        <h3 class='text-center'>Arma tu Pizza @if($tamano=='Me') Mediana @elseif($tamano=='Fa') Familiar @endif</h3>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">Arma tu Pizza</div>
            <div class="card-body">
                @foreach($ingredientes as $ing)
                <div class="form-group">
                    <input type="checkbox" value="{{$ing->nombre}}" />{{$ing->nombre}}
                </div>
                @endforeach
                <div class="form-group">
                    <button type="button" class="btn btn-success" disabled>Agregar Pizza</button>
                    <a href="/pizzas" class="btn btn-info">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 