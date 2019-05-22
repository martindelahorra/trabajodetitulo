@extends('layouts.master')
@section('contenido')
<div class="row">
    <div class="col">
        <h3 class='text-center'>Arma tu Pizza {{$tamano->nombre}}</h3>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col col-md-6">
        <div class="card">
            <div class="card-header">Arma tu Pizza</div>
            <div class="card-body">
                <form action="{{ route('cart.store') }}" method="POST">
                    {{ csrf_field() }}
                    @foreach($ingredientes as $ing)
                    <div class="form-group">
                        <input type="checkbox" value="{{$ing->cod_ingrediente}}" name="{{$ing->cod_ingrediente}}" />{{$ing->nombre}}
                    </div>
                    @endforeach
                    <div class="form-group">
                        <input type="hidden" value="{{ substr($tamano->nombre, 0, 2) }}" name="tamano" id="tamano">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success derecha">Añadir al carro <i class="fas fa-cart-plus"></i></button>
                        <a href="/pizzas" class="btn btn-info">Volver</a>
                    </div>
                    <input type="hidden" name="nombre" value="{{ $tamano->nombre }}">
                    <input type="hidden" name="precio" value="{{ $tamano->precio }}">
                    <input type="hidden" name="tipo" value="pizza">
                </form>
            </div>
        </div>
    </div>
    <div class="col offset-1 col-md-4 hidden" style="display: block;">
        <div class="card">
            <div class="card-header"><i class="fa fa-info-circle"></i><B> Información</B></div>
            <div class="card-body">
                <p>
                    $[Insertar calculo del valor estimado de la compra]
                </p>
            </div>
        </div>
    </div>
</div>
@endsection