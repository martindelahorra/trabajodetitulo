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
                    value="{{Auth::user()->nombre_completo}}" readonly>
                @endauth
            </div>

            <div class="form-group">
                <label for="direccion">Direccion</label>
                @unless (Auth::check())
                <input type="text" id="direccion" name="direccion" class="form-control" value="">
                @endunless
                @auth
                <input type="text" id="direccion" name="direccion" class="form-control"
                    value="{{Auth::user()->direccion}}" readonly>
                @endauth
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                @unless (Auth::check())
                <input type="text" id="telefono" name="telefono" class="form-control" value="">
                @endunless
                @auth
                <input type="text" id="telefono" name="telefono" class="form-control" value="{{Auth::user()->telefono}}"
                    readonly>
                @endauth
            </div>
            <div class="form-group">
                <label for="descripcion">Notas del Pedido (Opcional)</label>
                <textarea type="text" id="descripcion" name="descripcion" class="form-control" value=""
                    rows="5"></textarea>
            </div>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radio1" value="option1">
            <label class="form-check-label" for="inlineRadio1">Quiere ocupar los datos de su cuenta?</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="radio2" value="option2">
            <label class="form-check-label" for="inlineRadio2">Quiere editar los datos? </label>
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
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Generar Pedido</button>
            <a href="/cart" class="btn btn-outline-info">Volver</a>
        </div>
    </div>
    <div class="col-md-6">
        <h4><i class="fas fa-cart-arrow-down"></i> Carro: </h4>
        <hr>
        <ul>
            @foreach (Cart::content() as $item)
            <li>
                <h4>{{(($item->model->primaryKey=='cod_sushi')?'Roll:  '.$item->name:$item->name)}} (x{{$item->qty}})
                </h4>
                <div class="row">
                    <p class="col-8">@if ($item->model->primaryKey=='cod_sushi') ({{$item->model->descripcion}})
                        @elseif($item->model->primaryKey=='cod_tabla')
                        (Tabla de Sushi)
                        @elseif($item->model->primaryKey=='cod_pizza')
                        (Pizza)
                        @endif</p>
                    <p class="col-2">${{ number_format($item->subtotal,0,",",".") }}</p>
                </div>
            </li>
            @endforeach
        </ul>
        <hr>
        <div style="float: right;">
            <h5>Precio Total: <b>${{Cart::total(0,',','.')}}</b></h5>
        </div>

    </div>


    {{ Form::close() }}
</div>
<script>
    $("#radio1").attr('checked', true);
        $('input[type=radio][name=inlineRadioOptions]').change(function() {
        if (this.value == 'option1') {
            $("#direccion").attr("readonly", true);
            $("#nombre_completo").attr("readonly", true);
            $("#telefono").attr("readonly", true);
            }
        else if (this.value == 'option2') {
            $("#direccion").attr("readonly", false);
            $("#nombre_completo").attr("readonly", false);
            $("#telefono").attr("readonly", false);
            }
         });

</script>
@endsection