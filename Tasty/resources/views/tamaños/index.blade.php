@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Tamaños de Pizza</h2>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="/pizza_tamanos/create" class="btn btn-outline-primary izquierda">Agregar Tamaño</a>
        <a href="/pizza_tamanos/disponibles" class="btn btn-outline-success derecha">Todo disponible</a>
        <a href="/pizza_tamanos/nodisponibles" class="btn btn-outline-danger derecha">Todo no disponible</a>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <table class="col-sm-4 col-md-12 table table-bordered table-striped table-hover">
            <thead class="text-center">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($tamaño as $t)
                <tr>
                    <td>{{ $t->cod_tamaño }}</td>
                    <td>{{ $t->nombre }}</td>
                    <td>${{ number_format($t->precio,0,",",".") }}</td>
                    <td>
                        @if ($t->deleted_at==null)
                        Disponible
                        @else
                        No Disponible
                        @endif
                    </td>
                    <td>
                        {{ Form::open(array('url'=>'pizza_tamanos/'.$t->cod_tamaño,'method'=>'delete')) }}
                        <a href="/pizza_tamanos/{{$t->cod_tamaño}}/edit" class="btn btn-outline-dark">Editar</a>
                        @if ($t->deleted_at==null)
                        <button type="submit" class="btn btn-outline-danger">No Disponible</button>
                        @else
                        <a href="/pizza_tamanos/{{$t->cod_tamaño}}/restore" class="btn btn-outline-info">Disponible</a>
                        @endif
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="/" class="btn btn-outline-info">Volver al inicio</a>
    </div>
</div>
<style>
    .izquierda {
        float: left;
    }

    .derecha {
        float: right;
        margin-left: 4px;
    }
</style>
@endsection