@extends('layouts.master')

@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2> Pedidos</h2>
        <hr />
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-12">
        <h4>Detalles del pedido</h4>
        <div class="col">
            {{ Form::open(array('url'=>'pedidos')) }}
            <div class="form-group">

                <label for="nombre_completo">Nombre Completo</label>
                @unless (Auth::check())
                <input type="text" id="nombre_completo" name="nombre_completo" class="form-control" value="">
                @endunless
                @auth
                <input type="text" id="nombre_completo" name="nombre_completo" class="form-control" value="{{Auth::user()->nombre_completo}}">
                @endauth
            </div>

            <div class="form-group">
                <label for="direccion">Direccion</label>
                @unless (Auth::check())
                <input type="text" id="direccion" name="direccion" class="form-control" value="">
                @endunless
                @auth
                <input type="text" id="direccion" name="direccion" class="form-control" value="{{Auth::user()->direccion}}">
                @endauth
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                @unless (Auth::check())
                <input type="text" id="telefono" name="telefono" class="form-control" value="">
                @endunless
                @auth
                <input type="text" id="telefono" name="telefono" class="form-control" value="{{Auth::user()->telefono}}">
                @endauth
            </div>
            <div class="form-group">
                <label for="descripcion">Notas del Pedido (Opcional)</label>
                <textarea type="text" id="descripcion" name="descripcion" class="form-control" value="" rows="5"></textarea>
            </div>
        </div>
        @if($errors->any())
        <div class="col col-md-6">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
    <div class="col-md-6">
        <h4><i class="fas fa-cart-arrow-down"></i> Carro: </h4>
        <hr>
        <ul>
            @foreach (Cart::content() as $item)
            <li>
                <h4>{{$item->name}} (x{{$item->qty}})</h4>
                <div class="row">
                    <p class="col-6">({{ ($item->model->primaryKey=='cod_tabla')?'Tabla de Sushi':'Pizza' }})</p>
                    <p class="col-6">${{ number_format($item->subtotal,0,",",".") }}</p>
                </div>
            </li>
            @endforeach
        </ul>
        <h5>Precio Total: <b>${{Cart::total(0,',','.')}}</b></h5>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Generar Pedido</button>
        <a href="/cart" class="btn btn-outline-info">Volver</a>
    </div>
    {{ Form::close() }}
</div>

@endsection