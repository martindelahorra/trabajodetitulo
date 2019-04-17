@extends('layouts.master'); 
@section('contenido') 
@extends('layouts.master') 
@section('contenido')
<div class="row mt-4">
    @foreach ($sushis as $s)
    <div class="col-md-4">
        <div class="card mb-3">

            <div class="row">
                <div class="col ">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{$s->envoltura}}
                        </h4>
                    </div>
                    <p>{{$s->descripcion}}</p>
                    <h5>{{$s->cortes}}</h5>
                    
                </div>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection

@endsection