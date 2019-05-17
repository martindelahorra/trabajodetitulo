@extends('layouts.master')

@section('contenido')
<div class="row mt-4">
    @foreach ($pizzas as $p)
    <div class="col">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <a href="pizzas/crear/{{ substr($p->nombre,0,2) }}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection