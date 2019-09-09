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
            @can('isAdmin', App\Usuario::class)
            <div class="col">
                <a href="/pedidos/completados" class="btn btn-outline-success ">Pedidos completados</a>
            </div>
            @endcan

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
                    <th>Descripcion</th>
                    <th>Telefono</th>
                    <th>Metodo de pago</th>
                    <th>Envio/Retiro</th>
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
                        @if(Auth::user()->rol=='administrador')
                        <select class="estado_pedido" data-id="{{$p->cod_pedido}}">
                            <option value="P" @if ($p->estado_pedido=='P')
                                selected
                                @endif>En Preparacion</option>
                            <option value="E" @if ($p->estado_pedido=='E')
                                selected
                                @endif>En Camino</option>
                            <option value="C" @if ($p->estado_pedido=='C')
                                selected data-target="#exampleModal{{$p->cod_pedido}}" data-toggle="modal"
                                @endif>Completado</option>
                        </select>
                        @else
                        @if ($p->estado_pedido=='P')
                        <h5><span class="badge badge-secondary">En Preparacion</span></h5>
                        @endif
                        @if ($p->estado_pedido=='E')
                        <h5><span class="badge badge-primary">En Camino</span></h5>
                        @endif
                        @if ($p->estado_pedido=='C')
                        <h5><span class="badge badge-success">Completado</span></h5>
                        @endif
                        @endif

                    </td>
                    <td>{{$p->direccion}}</td>
                    <td>${{number_format($p->total_pedido,0,',','.')}}</td>
                    <td>{{date('d/m/Y h:i A', strtotime($p->fecha))}}</td>
                    <td><textarea name="" id="" cols="25" rows="5" readonly style="resize: none;">{{$p->descripcion}}</textarea></td>

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
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>

</div>
{{-- modal update --}}
<div class="modal modal-danger fade" id="exampleModal{{$p->cod_pedido}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Completar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Desea completar pedido? N° {{$p->cod_pedido}}</p>
                <p>De fecha: {{date('d/m/Y h:i A', strtotime($p->fecha))}}</p>
            </div>
            <div class="modal-footer">
                {{ Form::open(array('url'=>'pedido/'.$p->cod_pedido,'method'=>'patch')) }}
                <input type="text" value="C" hidden name="estado_pedido" id="estado_pedido">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    onClick="window.location.reload();">Cancelar</button>
                <button type="submit" class="btn btn-success">Completar</button>
                {{ Form::close() }}
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
                    if (this.value=='E' || this.value=='P') {
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
                    }else{
                        $('#exampleModal'+element.getAttribute('data-id')).modal('show');
                    }
                    
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