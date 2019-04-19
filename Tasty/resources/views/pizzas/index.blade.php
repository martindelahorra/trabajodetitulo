@extends('layouts.master')

@section('contenido')
<div class="row mt-4">
    @for ($i = 0; $i < 2; $i++)
    <div class="col">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <a href="pizzas/crear/@if($i==0)Me @elseif($i==1)Fa @endif">
                        <img src="@if($i==0) {{ asset('images/pizzas/Napolitana.jpg') }} @else {{ asset('images/pizzas/Hawaiana.jpg') }} @endif" class="card-img m-1" alt="Imagen no disponible">
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            @if($i==0)Mediana @else Familiar @endif
                        </h5>
                        <p class="card-text">Pizza con 3 ingredientes.</p>
                        <p>*+500 por ingrediente extra.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endfor
</div>
@endsection