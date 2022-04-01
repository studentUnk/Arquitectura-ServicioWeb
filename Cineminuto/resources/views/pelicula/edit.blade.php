@extends('layouts.app')

@section('content')

<div class="container">

<form action="{{ url('/pelicula/'.$pelicula->numero_pelicula)}}" method="post">
    @csrf
    {{ method_field('PATCH') }} 
    @include('pelicula.form',['modo'=>'Editar'])
</form>

</div>

@endsection