@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Ingredientes</h2>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="/ingredientes/create" class="btn btn-outline-primary izquierda">Agregar ingredientes</a>
        <a href="/ingredientes/disponibles" class="btn btn-outline-success derecha">Todo disponible</a>
        <a href="/ingredientes/nodisponibles" class="btn btn-outline-danger derecha">Todo no disponible</a>
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
                    <th>Categoría</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($ingredientes as $ing)
                <tr>
                    <td>{{ $ing->cod_ingrediente }}</td>
                    <td>{{ $ing->nombre }}</td>
                    <td>${{ number_format($ing->precio,0,",",".") }}</td>
                    <td>@if($ing->categoria=='C')
                        Carne
                        @elseif($ing->categoria=='V')
                        Vegetal
                        @else
                        Otro
                        @endif
                    </td>
                    <td>
                        @if ($ing->deleted_at==null)
                        Disponible
                        @else
                        No Disponible
                        @endif

                    </td>
                    <td>
                        {{ Form::open(array('url'=>'ingredientes/'.$ing->cod_ingrediente,'method'=>'delete')) }}
                        <a href="/ingredientes/{{$ing->cod_ingrediente}}/edit" class="btn btn-outline-dark">Editar</a>
                        @if ($ing->deleted_at==null)
                        <button type="submit" class="btn btn-outline-danger">No Disponible</button>
                        @else
                        <a href="/ingredientes/{{$ing->cod_ingrediente}}/restore" class="btn btn-outline-info">Disponible</a>
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
    .izquierda{
        float: left;
    }
    .derecha{
        float: right;
        margin-left: 4px;
    }
</style>
@endsection