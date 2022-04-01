<h1>{{ $modo }} pelicula</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
<label for="nombre_pelicula">Nombre</label>
        <input type="text" name="nombre_pelicula" value="{{ isset($pelicula->nombre_pelicula)?$pelicula->nombre_pelicula:old('nombre_pelicula') }}" id="nombre_pelicula" class="form-control">
        <br>
    </div>

    <div class="form-group">
    <label for="director_pelicula">Director</label>
    <input type="text" name="director_pelicula" value="{{ isset($pelicula->director_pelicula)?$pelicula->director_pelicula:old('director_pelicula') }}" id="director_pelicula" class="form-control">
    <br>
    </div>

    <div class="form-group">
    <label for="fecha_pubicacion_pelicula">Fecha</label>
    <input type="text" name="fecha_publicacion_pelicula" value="{{ isset($pelicula->fecha_publicacion_pelicula)?$pelicula->fecha_publicacion_pelicula:old('fecha_publicacion_pelicula') }}" id="fecha_publicacion_pelicula" class="form-control"> 
    <br>
    </div>

    <div class="form-group">
    <label for="duracion_pelicula">Duracion</label>
    <input type="text" name="duracion_pelicula" value="{{ isset($pelicula->duracion_pelicula)?$pelicula->duracion_pelicula:old('duracion_pelicula') }}" id="duracion_pelicula" class="form-control">
    <br>
</div>


    <input type="submit" value="{{ $modo }} pelicula" class="btn btn-success">
    <a href="{{ url('pelicula') }}" class="btn btn-primary">Regresar</a>
    <br>