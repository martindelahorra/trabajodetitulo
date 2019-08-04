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
                <input type="text" id="nombre_completo" name="nombre_completo" class="form-control"
                    value="{{Auth::user()->nombre_completo}}">
                @endauth
            </div>

            <div class="form-group">
                <label for="direccion">Direccion</label>
                @unless (Auth::check())
                <input type="text" id="nombre_completo" name="nombre_completo" class="form-control" value="">
                @endunless
                @auth
                <input type="text" id="nombre_completo" name="nombre_completo" class="form-control"
                    value="{{Auth::user()->direccion}}">
                @endauth
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                @unless (Auth::check())
                <input type="text" id="nombre_completo" name="nombre_completo" class="form-control" value="">
                @endunless
                @auth
                <input type="number" id="nombre_completo" name="nombre_completo" class="form-control"
                    value="{{Auth::user()->telefono}}">
                @endauth
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
                <h4>{{$item->name}}</h4>
                <div class="row">
                    <p class="col-6">({{ ($item->model->primaryKey=='cod_tabla')?'Tabla de Sushi':'Pizza' }})</p>
                    <p class="col-6">${{ number_format($item->model->precio,0,",",".") }}</p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="col ml-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Generar pedido
            </button>
            <button type="reset" class="btn btn-outline-dark">Restablecer</button>
            <a href="/cart" class="btn btn-outline-info">Volver</a>
        </div>
    {{ Form::close() }}
</div>

<div class="row">
    <div class="col-md-6">

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Generar Pedido</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection