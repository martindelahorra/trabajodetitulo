@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Metodos de Pago</h2>
        <hr />
    </div>
</div>
<div class="row">
    
</div>
<div class="row mt-2">
    <div class="col">
        <table class="col-sm-4 col-md-12 table table-bordered table-striped table-hover" id="tabIngre">
            <thead class="text-center">
                <tr>
                    <th>Id</th>
                    <th>Nombre Metodo</th>
                    <th>Disponibilidad</th>
                    <th>Opciones</th>

                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($metodos as $m)
                <tr>
                    <td>{{ $m->id_metodo }}</td>
                    <td>{{ $m->nombre_metodo }}</td>

                    <td>
                        @if ($m->deleted_at==null)
                        Disponible
                        @else
                        No Disponible
                        @endif
                    </td>
                    <td>
                        {{ Form::open(array('url'=>'metodo/'.$m->id_metodo,'method'=>'delete')) }}
                        @if ($m->deleted_at==null)
                        <button type="submit" class="btn btn-outline-danger">No Disponible</button>
                        @else
                        <a href="/metodo/{{$m->id_metodo}}/restore" class="btn btn-outline-info">Disponible</a>
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
<script>
    $(document).ready(function() {
        $('#tabIngre').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "responsive": true
        });
    });
</script>
@endsection