@extends('layouts.master')

@section('contenido')
<div class="row mt-4">
    @foreach ($agregados as $agre)
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <a href="pizzas/crear/">
                        <img src="{{$agre->imagen}}" class="card-img m-1" alt="Imagen no disponible">
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$agre->nom_agre}}
                        </h5>
                        <p class="card-text">{{ $agre->descripcion }}</p>
                        <button type="submit" class="btn btn-success derecha">Añadir
                            al carro <i class="fas fa-cart-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection