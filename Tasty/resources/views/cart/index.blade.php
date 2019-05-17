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
                <div class="col-sm-4 col-md-2">
                        <img src="{{($item->model->imagen)}}"
                        alt="Imagen no disponible"  width="150px" height="100px">
                </div>
                <div class="col-sm-4 col-md-3">
                    <h4>{{$item->model->nombre}}</h4>
                    <p>(Sushis)</p>
                </div>
                <div class="col-sm-4 col-md-2" >
                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-sm" type="submit" style="text-align: right"><span style="color:red;">Quitar</span></button>
                    </form>
                </div>
                <div class="col-sm-4 col-md-2">
                    <select name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                    </select>
                </div>
                <div class="col-sm-4 col-md-2">
                    <p>${{ number_format($item->model->precio,0,",",".") }}</p>
                </div>
            </div>
            <hr>
        @endforeach
        <div class="row">
            <div class="col-6">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste obcaecati voluptates eos placeat earum
                    quia inventore deserunt, mollitia quidem animi quod officiis officia, sint sed odio aperiam saepe
                    perferendis consectetur!</p>
            </div>
            <div class="col">
                <p>SubTotal</p>
                <p><b>Total</b> </p>
            </div>
            <div class="col">
                <p>$17.300</p>
                <p><b>$18.300</b></p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-8">
                <button type="button" class="btn btn-outline-secondary btn-lg">Continuar en la tienda</button>
            </div>
            <div class="col" >
                <button type="button" class="btn btn-info btn-lg" >Pedir <i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
        @else
            <h3>El carrito esta vacío</h3>
        @endif
    </div>
</div>
@endsection