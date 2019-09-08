@extends('layouts.master')

@section('contenido')
<div class="row mt-4">
    @foreach ($agregados as $agre)
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <img src="{{$agre->imagen}}" class="card-img m-1" alt="Imagen no disponible">
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{$agre->nom_agre}}
                        </h5>
                        <p class="card-text">{{ $agre->descripcion }}</p>
                        <p class="card-text derecha"></p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="izquierda">
                    <p class="card-text">Precio: ${{$agre->precio}}</p>
                </div>
                <div class="derecha">
                    @if ($agre->tipo!="B" && $agre->tipo!="P")
                    <form action="{{ route('cart.store') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success derecha">Añadir
                            al carro <i class="fas fa-cart-plus"></i></button>
                        <input type="hidden" name="id" value="{{ $agre->cod_agre }}">
                        <input type="hidden" name="tipo" value="{{$agre->tipo}}">
                    </form>
                    @else
                    @if ($agre->tipo=="P")
                    {{-- soy una pizza --}}
                    <a href="/agregado/{{$agre->cod_agre}}"><button class="btn btn-success derecha">
                            Elegir ingredientes <i class="fas fa-pizza-slice"></i></button></a>
                    @else
                    <form action="{{ route('cart.store') }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success derecha">Añadir
                            al carro <i class="fas fa-cart-plus"></i></button>
                        <input type="hidden" name="id" value="{{ $agre->cod_agre }}">
                        <input type="hidden" name="tipo" value="bebida">
                    </form>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection