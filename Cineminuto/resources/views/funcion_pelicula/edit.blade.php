@extends('layouts.app')

@section('content')

<div class="container">

<table class="table table-sm">
    <tbody>
        <tr>
            <th>Nombre</th>
            <td>{{$pelicula->nombre_pelicula}}</td>
        </tr>
        <tr>
            <th>Director</th>
            <td>{{$pelicula->director_pelicula}}</td>
        </tr>
        <tr>
            <th>Fecha de publicación</th>
            <td>{{$pelicula->fecha_publicacion_pelicula}}</td>
        </tr>
        <tr>
            <th>Duración</th>
            <td>{{$pelicula->duracion_pelicula}}</td>
        </tr>
    </tbody>
</table>

<hr>

<h6>Asientos disponibles</h6>
<form action="{{ url('/funcion_pelicula/'.$funcion->numero_funcion)}}" method="post" onsubmit="return alert('¿Esta seguro de comprar las boletas elegidas?');">
    @csrf
    {{ method_field('PATCH') }} 
    <input type="hidden" id="max_fila" name="max_fila" value="{{$max_cf['max_fil']}}">
    <input type="hidden" id="max_col" name="max_col" value="{{$max_cf['max_col']}}">
    <input type="hidden" id="max_asiento" name="max_asiento" value="{{$max_asiento}}">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Fila</th>
                @for ($i = 1; $i <= $max_cf['max_col']; $i++)
                    <th scope="col">{{$i}}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= $max_cf['max_fil']; $i++)
                <tr>
                    <th scope="col">{{$i}}</th>
                    @for ($j = 1; $j <= $max_cf['max_col']; $j++)
                        @foreach ($asiento as $silla)
                            @if(intval(($silla->posicion_asiento/$max_asiento)) == $i)
                                @if(intval(($silla->posicion_asiento%$max_asiento)) == $j)
                                    @if($silla->disponible_asiento == $disponible)
                                        <td><input type="checkbox" name="s{{$silla->posicion_asiento}}" id="s{{$silla->posicion_asiento}}" value="{{$silla->numero_asiento}}"></td>
                                    @else
                                        <td style="background-color:SlateBlue"></td>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>
    <input type="submit" value="Comprar" class="btn btn-success">
</form>
@endsection