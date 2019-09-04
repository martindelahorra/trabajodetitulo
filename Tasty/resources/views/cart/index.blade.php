@extends('layouts.master')
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2><i class="fas fa-shopping-cart"></i> Carrito</h2>
        <hr />
    </div>
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
                <img src="@if ($item->model->primaryKey=="cod_tabla" || $item->model->primaryKey=="cod_sushi")
                {{ ($item->model->imagen) }} @else @foreach ($tamanos as $tam) @if (substr($tam->nombre, 0,
                2)==$item->model->tamaño)
                {{ $tam->imagen }}
                @endif
                @endforeach
                @endif"
                alt="Imagen no disponible" style="max-width: 200px; width: 100%; height: auto; max-height:100px;">
            </div>
            <div class="col-sm-4">
                <h4>{{(($item->model->primaryKey=='cod_sushi')?'Roll:  '.$item->name:$item->name)}}</h4>
                <p> @if ($item->model->primaryKey=='cod_sushi') ({{$item->model->descripcion}})
                    @elseif($item->model->primaryKey=='cod_tabla')
                    (Tabla de Sushi)
                    @elseif($item->model->primaryKey=='cod_pizza')
                    (Pizza)
                    @endif </p>
            </div>
            <div class="col-sm-4 col-md-1">
                <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-sm" type="submit" style="text-align: right"><span
                            style="color:red;">Quitar</span></button>
                </form>
            </div>
            <div class="col-sm-2">
                <select class="quantity" data-id="{{ $item->rowId }}">
                    @for ($i = 1; $i < 6; $i++) <option {{$item->qty==$i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor

                        {{-- <option {{$item->qty=='2' ? 'selected' : '' }}>2</option>
                        <option {{$item->qty=='3' ? 'selected' : '' }}>3</option>
                        <option {{$item->qty=='4' ? 'selected' : '' }}>4</option>
                        <option {{$item->qty=='5' ? 'selected' : '' }}>5</option> --}}
                </select>
            </div>
            <div class="col-sm-2">
                <p>${{ number_format($item->subtotal,0,",",".") }}</p>
            </div>
        </div>
        <hr>
        @endforeach
        <div class="row">
            <div class="col-6">
                <p>Recuerde que en caso de elegir como medio de pago "efectivo", debe indicar en las notas del pedido
                    con cuanto cancela para una atención mas rápida</p>
                {{-- <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste obcaecati voluptates eos placeat earum
                    quia inventore deserunt, mollitia quidem animi quod officiis officia, sint sed odio aperiam saepe
                    perferendis consectetur!</p> --}}
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
            <div class="col-8">
                <button type="button" class="btn btn-outline-secondary btn-lg">Continuar en la tienda</button>
            </div>
            <div class="col">
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
                        //console.log(response);
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