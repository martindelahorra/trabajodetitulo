@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Ingredientes</h2>
        <hr />
    </div>
</div>
<!-- @can('create',App\Usuario::class) -->
<div class="row">
    <div class="col">
        <a href="#" class="btn btn-outline-primary" disabled>Agregar ingredientes</a>
    </div>
</div>
<!-- @endcan -->
<div class="row mt-2">
    <div class="col">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ingredientes as $ing)
                <tr>
                    <td>{{ $ing->cod_ingrediente }}</td>
                    <td>{{ $ing->nombre }}</td>
                    <td>{{ $ing->precio }}</td>
                    <td>@if($ing->categoria=='C')
                        Carne
                        @elseif($ing->categoria=='V')
                        Vegetal
                        @else
                        Otro
                        @endif
                    </td>
                    <td>
                        <!-- form -->
                        <a href="#" class="btn btn-outline-dark">Editar</a>
                        <!-- <button type="" class="btn btn-outline-danger">Borrar</button> -->
                        <a href="#" class="btn btn-outline-info">Borrar</a>
                        <!-- endForm -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="/" class="btn">Volver al inicio</a>
    </div>
</div>
@endsection