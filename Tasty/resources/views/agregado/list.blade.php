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
        <a href="/agregado/create" class="btn btn-outline-primary izquierda">Agregar promoción</a>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <table class="col-sm-4 col-md-12 table table-bordered table-striped table-hover" id="tabIngre">
            <thead class="text-center">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Tipo</th>
                    <th>Sugerido</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($agregados as $a)
                <tr>
                    <td>{{$a->cod_agre}}</td>
                    <td>{{$a->nom_agre}}</td>
                    <td>{{$a->precio}}</td>
                    <td><select class="form-control">
                        <option value="C"@if($a->tipo=='A') selected @endif>Agregado</option>
                        <option value="V"@if($a->tipo=='P') selected @endif>Pizza</option>
                        <option value="O"@if($a->tipo=='S') selected @endif>Handroll</option>
                    </select></td>
                    <td>
                        <input type="checkbox" @if($a->sugerido==true)checked @endif name="" id="">
                    </td>
                    <td>
                        {{ $a->descripcion }}
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detalle del Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    <li>Pizza Familiar <span class="text-muted texto-info">(Jamón, Cebolla Morada, Extra Queso,
                            Piña)</span></li>
                    <li>Tabla 24 Piezas <span class="text-muted texto-info">(Sesamo, Panko frito)</span></li>
                    <li>Pizza Familiar <span class="text-muted texto-info">(Champiñón, Choclo, Palmito, Extra Queso,
                            Tomate)</span></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
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