@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Pedidos Activos</h2>
        <hr />
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        @if (session()->has('success_message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success_message') }}
        </div>
        @endif
        @if(count($errors) >0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <a href="/pedidos" class="btn btn-primary "><i class="fas fa-long-arrow-alt-left"></i> Pedidos
                    Totales</a>
            </div>
            <div class="col" style="text-align: right">
                <label for="">Buscar: </label>
            </div>
            <div class="col-4">
                <input type="text" name="search" id="search" class="form-control" />
            </div>
        </div>
        <br>



        <table class="col-sm-4 col-md-12 table table-bordered table-striped table-hover table-responsive-lg"
            id="tabla_pedidos">
            <thead class="text-center">
                <tr>
                    @if(Auth::user()->rol=='administrador')
                    <th>Codigo</th>
                    <th>Nombre Usuario</th>
                    @endif
                    <th>Estado Pedido</th>
                    <th>Dirección</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Detalle</th>

                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($pedidos as $p)
                <tr class="registros">
                    @if(Auth::user()->rol=='administrador')
                    <td>{{ $p->cod_pedido }}</td>
                    <td>{{ $p->nombre_completo }}</td>
                    @endif
                    <td>

                        <h4>Completado</h4>


                    </td>


                    <td>{{$p->direccion}}</td>
                    <td>${{number_format($p->total_pedido,0,',','.')}}</td>
                    <td>{{date('d/m/Y h:i A', strtotime($p->fecha))}}</td>

                    <td>
                        <button type="button" class="btn btn-outline-info btn-fix" data-toggle="modal"
                            data-target="#Modal{{$p->cod_pedido}}">Detalle pedido</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@foreach ($pedidos as $p)
<!-- Modal -->
<div class="modal fade" id="Modal{{$p->cod_pedido}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pedido N°: {{$p->cod_pedido}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    {{-- $r es el registro de intersección de pizzas --}}
                    @foreach ($reg_p as $r)
                    @if ($r->cod_pedido == $p->cod_pedido)
                    @foreach ($pizzas as $pi)
                    {{-- $pi es el registro de la tabla pizzas --}}
                    @if ($r->cod_pizza == $pi->cod_pizza)
                    @foreach ($tamanos as $ta)
                    {{-- $ta es el registro de la tabla tamanos --}}
                    @if ($pi->tamaño == substr($ta->nombre,0,2))
                    <li>Pizza {{ $ta->nombre }}
                        <span class="text-muted texto-info">(</span>
                        @foreach ($reg_ing as $ing1)
                        @if ($pi->cod_pizza==$ing1->cod_pizza)
                        @foreach ($ingredientes as $ing2)
                        @if ($ing2->cod_ingrediente==$ing1->cod_ingrediente)
                        <span class="texto-coma text-muted texto-info">{{$ing2->nombre.' |'}}</span>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        <span class="text-muted texto-info">)</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    {{-- $reg_t es la colección de tablas manejadas con el puntero $t --}}
                    @foreach ($reg_t as $t)
                    @if ($t->cod_pedido == $p->cod_pedido)
                    @foreach ($tablas as $ta)
                    @if ($t->cod_tabla == $ta->cod_tabla)
                    <li>{{$ta->nombre}}
                        <span class="text-muted texto-info">(</span>
                        @foreach ($tsushis as $ts)
                        @if ($ts->cod_tabla == $ta->cod_tabla)
                        <span class="texto-coma text-muted texto-info">
                            @foreach ($sushis as $s)
                            @if ($s->cod_sushi == $ts->cod_sushi)
                            {{$s->envoltura.' |'}}
                            @endif
                            @endforeach
                        </span>
                        @endif
                        @endforeach
                        <span class="text-muted texto-info">)</span>
                    </li>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    {{-- <li>Pizza Familiar <span class="text-muted texto-info">(Jamón, Cebolla Morada, Extra Queso,
                            Piña)</span></li>
                    <li>Tabla 24 Piezas <span class="text-muted texto-info">(Sesamo, Panko frito)</span></li> --}}
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

</div>
@endforeach
@if(Auth::user()->rol=='administrador')

<script>
    $(document).ready(function () {
        $('#search').keyup(function () {
            search_table($(this).val());
        });
        function search_table(value) {
            $('#tabla_pedidos .registros').each(function () {
                var found = 'false';
                $(this).each(function () {
                    if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                        found = 'true';
                    }
                });
                if (found == 'true') {
                    $(this).show();
                }
                else {
                    $(this).hide();
                }
            });
        }
    });  
</script>

<script src="{{ asset('js/app.js') }}">
</script>
<script>
    (function() {
            const classname = document.querySelectorAll('.estado_pedido')
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function() {
                    const url = 'pedido/'+element.getAttribute('data-id')
                    console.log(url);
                    axios.patch(url, {
                            estado_pedido: this.value
                        })
                        .then(function(response) {
                            console.log(response);
                            window.location.href = '/pedidos'
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                })
            })
        })();
</script>


@endif

{{-- <script>
    $('.btn-fix').click(function(){
        var aux = $('.texto-coma').text();
        console.log($.trim(aux));
        console.log(aux.replace(', )',')'));
    });
</script> --}}
@endsection