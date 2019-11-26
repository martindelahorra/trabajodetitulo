@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2><i class="fas fa-shopping-cart"></i> Carrito</h2>
        <hr />
    </div>
    {{-- <div class="col-2">
        <a href="/cart/content" class="btn btn-info">Cart Content<i class="fas fa-arrow-right"></i></a>
    </div> --}}
</div>

<div class="row">
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

        @if(Cart::count()>0)

        <h3>{{Cart::count()}} Producto(s) en el carrito</h3>
        <hr>
        @foreach (Cart::content() as $item)
        <div class="row">
            <div class="col-sm-2">
                <img src="
                @if ($item->model->primaryKey != "cod_pizza") {{ ($item->model->imagen) }} @else @foreach ($tamanos as
                    $tam) @if ($tam->cod_tamaño==$item->model->cod_tamaño)
                {{ $tam->imagen }}
                @endif
                @endforeach
                @endif"
                alt="Imagen no disponible" style="max-width: 200px; width: 100%; height: auto; max-height:100px;">
            </div>
            <div class="col-sm-4">
                <h4>
                    {{(($item->model->primaryKey=='cod_sushi')?'Roll:  '.$item->name:$item->name)}}
                    @if ($item->model->tipo=='P')
                    : {{$item->options->ingredientes}}
                    @endif
                </h4>
                <p> @if ($item->model->primaryKey=='cod_sushi')
                    ({{$item->model->descripcion}})
                    @elseif($item->model->primaryKey=='cod_tabla')
                    (Tabla de Sushi)
                    @elseif($item->model->primaryKey=='cod_pizza')
                    (Pizza)
                    @elseif($item->model->primaryKey=='cod_agre')
                    @if ($item->model->tipo=="P")
                    (Promo de Pizza)
                    @elseif($item->model->tipo=="B")
                    (Bebida)
                    @elseif($item->model->tipo=="T")
                    (Promo de Tabla de Sushi)
                    @elseif($item->model->tipo=="S")
                    (Promo de Roll de Sushi)
                    @elseif($item->model->tipo=="A")
                    (Agregado)
                    @endif
                    @endif </p>
            </div>
            <div class="col-sm-1">
                <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-sm" type="submit" style="text-align: right"><span
                            style="color:red;">Quitar</span></button>
                </form>
            </div>
            <div class="col-sm-1">
                <select class="quantity" data-id="{{ $item->rowId }}">
                    @for ($i = 1; $i < 6; $i++) <option {{$item->qty==$i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                </select>
            </div>
            <div class="col-sm-2">
                @if ($item->options->bebida!=null)
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#modalBebida{{$item->rowId}}">
                    Sabor bebida
                </button>
                @endif
            </div>
            <div class="col-sm-1 offset-md-1">
                <p>${{ number_format($item->subtotal,0,",",".") }}</p>
            </div>
        </div>
        <hr>
        <!-- Modal -->
        <div class="modal fade" id="modalBebida{{$item->rowId}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Que sabor desea para su bebida?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Form::open(array('url'=>'cart/'.$item->rowId,'method'=>'PATCH')) }}
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-control" name="bebida" id="bebida">
                                @foreach ($bebidas as $b)
                                @if ($b->tamaño == $item->options->bebida)
                                <option value="{{$b->cod_bebida}}">{{$b->nombre}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-info">Elegir</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-6">
                <p>Recuerde que en caso de elegir como medio de pago "efectivo", debe indicar en las notas del pedido
                    con cuanto cancela para una atención mas rápida</p>
            </div>
            <div class="col">
                <p><b>Total</b> </p>
            </div>
            <div class="col">
                <p><b>${{Cart::total(0,',','.')}}</b></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-10">
                <button type="button" class="btn btn-outline-secondary btn-lg">Continuar en la tienda</button>
            </div>
            <div class="col-2">
                <a href="/pedidos/create" class="btn btn-info btn-lg">Pedir <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
        @else
        <h3>El carrito esta vacío</h3>
        @endif
    </div>
</div>

<script src="{{ asset('js/app.js') }}">
</script>
<script>
    (function() {
        const classname = document.querySelectorAll('.quantity')
        Array.from(classname).forEach(function(element) {
            element.addEventListener('change', function() {
                const url = 'cart/'+element.getAttribute('data-id')
                axios.patch(url, {
                        quantity: this.value
                    })
                    .then(function(response) {
                        
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            })
        })
    })();
</script>
@endsection