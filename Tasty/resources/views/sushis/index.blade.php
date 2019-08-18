@extends('layouts.master');
@section('contenido')
<div class="row mt-4">
    <div class="col">
        <h2>Rolls</h2>
        <hr />
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="/sushis/create" class="btn btn-outline-primary ">Agregar Roll</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col">
        @foreach ($sushis as $s)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-6 col-sm-3">
                        <img src="{{$s->imagen}}" class="card-img-top" alt="..." width="20px" height="200px">
                    </div>
                    <div class="col-xs-6 col-sm-3">
                        <h3 class="card-title">Envoltura: {{$s->envoltura}}</h3>
                        <p>{{$s->descripcion}}</p>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        Cortes: {{$s->cortes}}
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <h5>Precio: $13.300 </h5>
                    </div>
                    <div class="ml-1 col-xs-1 p-2">
                    <a href="/sushis/{{$s->cod_sushi}}/edit" class="btn btn-outline-dark">Editar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection