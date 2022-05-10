@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
{{ Session::get('mensaje') }}
</div>
@endif

Funciones que se encuentran actualmente en el cine
<table class="table table-striped table-light">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Horario</th>
            <th>Sala</th>
            <th>Pelicula</th>
            <th>Disponibilidad</th>
            <th>Valor</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($funciones as $funcion_pelicula)
        <tr>
            <td>{{$funcion_pelicula->numero_funcion}}</td>
            <td>{{$funcion_pelicula->numero_horario}}</td>
            <td>{{$funcion_pelicula->numero_sala}}</td>
            <td>{{$funcion_pelicula->numero_pelicula}}</td>
            <td>{{$funcion_pelicula->disponible_funcion}}</td>
            <td>{{$funcion_pelicula->valor_funcion}}</td>
            <td>
            <a href="{{ url('/funcion_pelicula/'.$funcion_pelicula->numero_funcion.'/edit')}}" class="btn btn-success">
                Comprar
            </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $funciones->links() !!}

</div>

@endsection