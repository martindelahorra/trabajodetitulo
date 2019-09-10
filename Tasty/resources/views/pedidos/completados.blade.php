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
        <table class="col-sm-4 col-md-12 table table-bordered table-striped table-hover table-responsive-lg "
            id="tabPedidos">
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
                    <th>Telefono</th>
                    <th>Metodo Pago</th>
                    <th>Envio/Retiro</th>
                    <th>Detalle</th>
                    

                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($pedidos as $p)
                <tr class="registros">
                    @if(Auth::user()->rol=='administrador')
                    <td>N°: {{ $p->cod_pedido }}</td>
                    <td>{{ $p->nombre_completo }}</td>
                    @endif
                    <td>
                        <span class="badge badge-success">Completado</span>
                    </td>


                    <td>{{$p->direccion}}</td>
                    <td>${{number_format($p->total_pedido,0,',','.')}}</td>
                    <td>{{date('d/m/Y h:i A', strtotime($p->fecha))}}</td>
                    <td>{{$p->telefono}}</td>
                    <td>{{$p->metodo_pago_borrados->nombre_metodo}}</td>
                    <td>@if ($p->delivery == 0)
                        Envio
                        @else
                        Retiro en local
                        @endif</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Pedido N°: {{$p->cod_pedido}} <span
                            class="text-muted">{{date('d/m/Y h:i A', strtotime($p->fecha))}}</span></h5>
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
                        {{-- $pi es el registro de las pizzas --}}
                        @if ($r->cod_pizza == $pi->cod_pizza)
                        @foreach ($tamanos as $ta)
                        {{-- $ta es el registro de la tabla tamanos --}}
                        @if ($pi->cod_tamaño == $ta->cod_tamaño)
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
                            (x {{$r->cantidad}})
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
                            <span class="text-muted texto-info">) </span>
                            (x {{$t->cantidad}})
                        </li>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                        <?php $varCount = 0;  ?>
                        @foreach ($p->agregados as $a)
                        <li>{{$a->nom_agre}}
                            @if($a->tipo=='P' || $a->tipo=='B')
                            <span class="text-muted texto-info">(
                                @if($a->bebida_litros!=null)
                                {{substr($p->descripcion,strpos($p->descripcion,$a->bebida_litros),20)}}
                                <?php $varCount=$varCount+1;  ?>
                                @endif
                                @if ($a->tipo=='P')
                                | {{substr($p->descripcion,strpos($p->descripcion,'Ingredientes:'),-1)}}
                                @endif
                                )</span>
                            @endif
                            (x @foreach ($reg_agre as $ra)
                                    @if ($ra->cod_agre==$a->cod_agre && $ra->cod_pedido==$p->cod_pedido)
                                        {{$ra->cantidad}}
                                    @endif
                                @endforeach)
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    
    </div>
@endforeach

<script>
    $(document).ready(function() {
        $('#tabPedidos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            "responsive": true
        });
    });
</script>

{{-- <script>
    $('.btn-fix').click(function(){
        var aux = $('.texto-coma').text();
        console.log($.trim(aux));
        console.log(aux.replace(', )',')'));
    });
</script> --}}
@endsection