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
        <a href="/sushis/create" class="btn btn-outline-primary ">Agregar Roll</a>
        {{-- <a href="/ingredientes/disponibles" class="btn btn-outline-success derecha">Todo disponible</a>
        <a href="/ingredientes/nodisponibles" class="btn btn-outline-danger derecha">Todo no disponible</a> --}}
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <table class="col-sm-4 col-md-12 table table-bordered table-striped table-hover table-responsive-lg" id="tabTablas">
            <thead class="text-center">
                <tr>
                    <th>Id</th>
                    <th style="width: 200px;">Imagen</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Opcion</th>

                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($sushi as $s)
                <tr>
                    <td>{{ $s->cod_sushi }}</td>
                    <td style="width: 200px;"><img src="{{($s->imagen)}}" class="card-img"
                            alt="Imagen no disponible" width="150px" height="120px"></td>
                    <td>{{ $s->envoltura }}</td>
                    <td>{{ $s->descripcion}}</td>
                    <td>${{ number_format($s->precio,0,",",".") }}</td>

                    <td>
                        {{ Form::open(array('url'=>'sushis/'.$s->cod_sushi,'method'=>'delete')) }}
                        <a href="/sushis/{{$s->cod_sushi}}/edit" class="btn btn-outline-dark">Editar</a>
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                            data-target="#exampleModal{{$s->cod_sushi}}">
                            Borrar
                        </button>
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
        <a href="/sushis" class="btn btn-outline-info">Volver al inicio</a>
    </div>
</div>
@foreach ($sushi as $s)


<!-- Modal -->
<div class="modal modal-danger fade" id="exampleModal{{$s->cod_sushi}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Esta seguro de que quiere borrar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$s->envoltura}}
            </div>
            <div class="modal-footer">
                {{ Form::open(array('url'=>'sushis/'.$s->cod_sushi,'method'=>'delete')) }}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Borrar</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    $(document).ready(function() {
        $('#tabTablas').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "responsive": true
        });
    });
</script>

@endsection