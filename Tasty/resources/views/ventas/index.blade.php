@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Ventas Realizadas</h2>
        <hr />
    </div>
</div>
<div class="row mt-2">
    <div class="col">

        <table class="col-sm-4 col-md-12 table table-bordered table-striped table-hover table-responsive-lg "
            id="tabVentas">
            <thead class="text-center">
                <tr>

                    <th>Codigo Venta</th>
                    <th>Numero Pedido</th>
                    <th>Monto Total</th>
                    <th>Fecha Venta</th>

                </tr>
            </thead>
            <tbody class="text-center">



                @foreach ($ventas as $v)
                <tr>
                    <td>{{$v->id_venta}}</td>
                    <td id="precio">N°: {{$v->cod_pedido}}</td>
                    <td>$ {{$v->monto_total}}</td>
                    <td>{{date('d/m/Y h:i A', strtotime($v->fecha_venta))}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


<script>
    $(document).ready(function() {
    $('#tabVentas').DataTable( {
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', text: 'Copiar' },
            { extend: 'csv', text: 'Csv' },
            { extend: 'excel', text: 'Exportar excel'},
            { extend: 'pdf', text: 'PDF' },
            { extend: 'print', text: 'Imprimir' }
        ]
    } );
} );
</script>

{{-- <script>
    $('.btn-fix').click(function(){
        var aux = $('.texto-coma').text();
        console.log($.trim(aux));
        console.log(aux.replace(', )',')'));
    });
</script> --}}
@endsection