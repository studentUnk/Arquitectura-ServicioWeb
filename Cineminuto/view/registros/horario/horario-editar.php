<h1 class="page-header">
	Horario - <?php 
		echo $alm->numero_horario != null ? $alm->numero_horario:'Nuevo registro';
	?>
</h1>
<ol class="breadcrumb">
	<li><a href="?c=Horario">Horario</a></li>
	<li class="active">
		<?php 
			echo $alm->numero_horario != null ? $alm->numero_horario : 'Nuevo registro'; 
		?>
	</li>
</ol>

<form id="frm-horario" action="?c=Horario&a=Guardar" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $alm->numero_horario != null ?  $alm->numero_horario : null; ?>"/>
	<div class="from-group">
		<label>Hora de inicio</label>
		<input type="text" name="HoraInicio" value="<?php echo $alm->numero_horario != null ? $alm->hora_inicio : ''; ?>" class="form-control" placeholder="Ingrese la hora de inicio" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Hora de finalización</label>
		<input type="text" name="HoraFin" value="<?php	echo $alm->numero_horario != null ? $alm->hora_fin : ''; ?>" class="form-control" placeholder="Ingrese la hora final" data-validacion-tipo="requerido|min:3"/>
	</div>

	<hr/>
	<div class="text-right">
		<button class="btn btn-success">Guardar</button>
	</div>
	
</form>

<script>
	$(document).ready(function(){
		$("#frm-horario").submit(function(){
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