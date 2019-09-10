@extends('layouts.master')
@section('contenido')
<br>
@can('isAdmin', App\Usuario::class)
<a href="/tabla_sushis/list" class="btn btn-outline-primary izquierda">Listado Tablas</a>
@endcan

<br>
<div class="row mt-4">
    @foreach ($tabla_sushi as $tabla)
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col ">
                    <img src="{{($tabla->imagen)}}" class="card-img" alt="Imagen no disponible" width="450"
                        height="400">
                </div>
            </div>
            <div class="row">
                <div class="col ">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{$tabla->nombre}}
                        </h4>
                        <hr>
                        <ul>
                            @foreach ($inter as $i) @if ($i->cod_tabla==$tabla->cod_tabla)
                            <li>
                                <p><b>{{$i->sushi->envoltura}}:</b> {{$i->sushi->descripcion}} ({{$i->sushi->cortes}})</p>
                            </li>
                            @endif @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <p>Precio: ${{number_format($tabla->precio,0,",",".")}} <button type="submit" class="btn btn-success derecha">Añadir
                                    al carro <i class="fas fa-cart-plus"></i></button></p>
                            <input type="hidden" name="id" value="{{ $tabla->cod_tabla }}">
                            <input type="hidden" name="nombre" value="{{ $tabla->nombre }}">
                            <input type="hidden" name="precio" value="{{ $tabla->precio }}">
                            <input type="hidden" name="tipo" value="tabla">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection