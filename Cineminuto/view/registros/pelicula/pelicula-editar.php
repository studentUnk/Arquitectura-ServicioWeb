<h1 class="page-header">
	<?php 
		echo $mat->numero_pelicula != null ? $mat->numero_pelicula:'Nuevo registro';
	?>
</h1>
<ol class="breadcrumb">
	<li><a href="?c=Pelicula">Pelicula</a></li>
	<li class="active">
		<?php 
			echo $mat->numero_pelicula != null ? $mat->numero_pelicula : 'Nuevo registro'; 
		?>
	</li>
</ol>

<form id="frm-pelicula" action="?c=Pelicula&a=Guardar" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="numero" value="<?php echo $mat->numero_pelicula != null ?  $mat->numero_pelicula : null; ?>"/>
	<div class="from-group">
		<label>Nombre</label>
		<input type="text" name="Nombre" value="<?php echo $mat->numero_pelicula != null ? $mat->nombre : ''; ?>" class="form-control" placeholder="Ingrese nombre" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Director</label>
		<input type="text" name="Director" value="<?php	echo $mat->numero_pelicula != null ? $mat->director : ''; ?>" class="form-control" placeholder="Ingrese director" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Fecha</label>
		<input type="text" name="FechaPublicacion" value="<?php	echo $mat->numero_pelicula != null ? $mat->fecha_publicacion : ''; ?>" class="form-control" placeholder="Ingrese la fecha de publicación" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Duracion</label>
		<input type="text" name="Duracion" value="<?php echo $mat->numero_pelicula != null ? $mat->duracion : ''; ?>" class="form-control" placeholder="Ingrese duracion" 		data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<hr/>
	<div class="text-right">
		<button class="btn btn-success">Guardar</button>
	</div>
	
</form>

<script>
	$(document).ready(function(){
		$("#frm-pelicula").submit(function(){
			return $(this).validate();
		});
	});
</script>
<script src="../assets/js/jquery-ui/jquery-ui.js"></script>
<script src="../assets/js/ini.js"></script>
<!--<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>-->