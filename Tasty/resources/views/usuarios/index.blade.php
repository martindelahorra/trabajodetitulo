@extends('layouts.master')

@section('contenido')
<hr>
<div class="row mt-3">
    <div class="col">
        <h2>Usuarios</h2>
        <hr>
    </div>
</div>

<div class="row mt-4">
    <div class="col">
        @foreach ($usuarios as $u)
        <p>{{ $u->username}}</p>
        @endforeach
    </div>
</div>
@endsection