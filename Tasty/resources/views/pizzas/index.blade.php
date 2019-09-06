@extends('layouts.master')

@section('contenido')
@if($errors->any())
<div class="col col-md-6 offset-md-3 mt-3">
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<div class="row mt-2">
    @foreach ($pizzas as $p)
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <a href="pizzas/crear/{{ $p->cod_tamaño }}">
                        <img src="{{$p->imagen}}" class="card-img m-1" alt="Imagen no disponible">
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$p->nombre}}
                        </h5>
                        <p class="card-text">Pizza con 3 ingredientes.</p>
                        <p>*+500 por ingrediente extra.</p>
                        <a href="pizzas/crear/{{ $p->cod_tamaño }}"><button class="btn btn-success derecha">
                                Elegir ingredientes <i class="fas fa-pizza-slice"></i></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection