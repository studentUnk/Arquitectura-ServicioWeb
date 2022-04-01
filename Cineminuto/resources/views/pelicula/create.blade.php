@extends('layouts.app')

@section('content')

<div class="container">

<form action="{{ url('/pelicula')}}" method="post">
    @csrf
    @include('pelicula.form',['modo'=>'Crear'])
</form>

</div>

@endsection