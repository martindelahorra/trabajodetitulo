@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Tablas Sushi</h2>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="/tabla_sushis/create" class="btn btn-outline-primary ">Agregar Tabla</a>
        {{-- <a href="/ingredientes/disponibles" class="btn btn-outline-success derecha">Todo disponible</a>
        <a href="/ingredientes/nodisponibles" class="btn btn-outline-danger derecha">Todo no disponible</a> --}}
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <table class="col-sm-4 col-md-12 table table-bordered table-striped table-hover">
            <thead class="text-center">
                <tr>
                    <th>Id</th>
                    <th style="width: 200px;">Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Opcion</th>

                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($tabla_sushi as $tabla)
                <tr>
                    <td>{{ $tabla->cod_tabla }}</td>
                    <td style="width: 200px;"><img src="{{($tabla->imagen)}}" class="card-img" alt="Imagen no disponible" width="150px" height="100px"></td>
                    <td>{{ $tabla->nombre }}</td>
                    <td>${{ number_format($tabla->precio,0,",",".") }}</td>

                    <td>
                        {{ Form::open(array('url'=>'tabla_sushis/'.$tabla->cod_tabla,'method'=>'delete')) }}
                        <a href="/tabla_sushis/{{$tabla->cod_tabla}}/edit" class="btn btn-outline-dark">Editar</a>

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
        <a href="/tabla_sushis" class="btn btn-outline-info">Volver al inicio</a>
    </div>
</div>

@endsection