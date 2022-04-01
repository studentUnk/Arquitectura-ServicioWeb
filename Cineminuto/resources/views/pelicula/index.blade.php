@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
{{ Session::get('mensaje') }}
</div>
@endif

<a href="{{ url('pelicula/create') }}" class="btn btn-success">Registrar nueva pelicula</a><br>
Peliculas que se encuentran actualmente en la base de datos
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Director</th>
            <th>Fecha de publicacion</th>
            <th>Duracion</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($peliculas as $pelicula)
        <tr>
            <td>{{$pelicula->numero_pelicula}}</td>
            <td>{{$pelicula->nombre_pelicula}}</td>
            <td>{{$pelicula->director_pelicula}}</td>
            <td>{{$pelicula->fecha_publicacion_pelicula}}</td>
            <td>{{$pelicula->duracion_pelicula}}</td>
            <td>
            <a href="{{ url('/pelicula/'.$pelicula->numero_pelicula.'/edit')}}" class="btn btn-warning">
                Editar
            </a>
            <form action="{{ url('/pelicula/'.$pelicula->numero_pelicula)}}" method="post" class="d-inline">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('¿Borrar pelicula?')" value="Borrar" class="btn btn-danger">
            </form>    
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $peliculas->links() !!}

</div>

@endsection