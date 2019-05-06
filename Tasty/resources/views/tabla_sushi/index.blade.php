@extends('layouts.master') 
@section('contenido')


<div class="row mt-4">
    @foreach ($tabla_sushi as $tabla)
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col ">
                    <img src="data:image/jpeg;base64,{{base64_encode($tabla->imagen)}}" class="card-img" alt="Imagen no disponible">
                </div>

            </div>
            <div class="row">
                <div class="col ">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{$tabla->nombre}}
                        </h4>
                        <hr>
                        <ul>
                            @foreach ($inter as $i) @if ($i->cod_tabla==$tabla->cod_tabla)
                            <li>
                                <p><b>{{$i->sushi->envoltura}}:</b> {{$i->sushi->descripcion}}</p>
                            </li>
                            @endif @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        Precio: ${{$tabla->precio}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection