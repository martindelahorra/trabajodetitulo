@extends('layouts.master')

@section('contenido')
<div class="row mt-4">
    @foreach($pizzas as $p)
    <div class="col">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <a href="pizzas/crear/{{$p->tamaño}}">
                        <img src="data:image/jpeg;base64,{{base64_encode($p->imagen)}}" class="card-img m-1" alt="Imagen no disponible">
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            @switch($p->tamaño)
                            @case('Me')
                            Mediana
                            @break
                            @case('Fa')
                            Familiar
                            @break
                            @endswitch
                        </h5>
                        <p class="card-text">{{$p->descripcion}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection 