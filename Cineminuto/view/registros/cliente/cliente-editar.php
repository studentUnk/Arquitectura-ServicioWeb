<h1 class="page-header">
	Cliente - <?php 
		echo $alm->documento != null ? $alm->nombre:'Nuevo registro';
	?>
</h1>
<ol class="breadcrumb">
	<li><a href="?c=Cliente">Cliente</a></li>
	<li class="active">
		<?php 
			echo $alm->documento != null ? $alm->nombre : 'Nuevo registro'; 
		?>
	</li>
</ol>

<form id="frm-cliente" action="?c=Cliente&a=Guardar" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="upin" value="<?php echo $alm->documento != null ?  1 : null; ?>"/>
	
	<div class="from-group">
		<label>Documento</label>
		<input type="text" name="id" value="<?php echo $alm->documento != null ? $alm->documento : ''; ?>" class="form-control" placeholder="Ingrese su documento" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Nombre</label>
		<input type="text" name="Nombre" value="<?php echo $alm->documento != null ? $alm->nombre : ''; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Apellido</label>
		<input type="text" name="Apellido" value="<?php	echo $alm->documento != null ? $alm->apellido : ''; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Genero</label>
		<input type="text" name="Genero" value="<?php echo $alm->documento != null ? $alm->genero : ''; ?>" class="form-control" placeholder="Ingrese su genero" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Celular</label>
		<input type="text" name="Celular" value="<?php echo $alm->documento != null ? $alm->celular : ''; ?>" class="form-control" placeholder="Ingrese su celular" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Telefono</label>
		<input type="text" name="Telefono" value="<?php echo $alm->documento != null ? $alm->telefono : ''; ?>" class="form-control" placeholder="Ingrese su telefono" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Correo</label>
		<input type="text" name="Correo" value="<?php echo $alm->documento != null ? $alm->correo : ''; ?>" class="form-control" placeholder="Ingrese su correo" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Direccion</label>
		<input type="text" name="Direccion" value="<?php echo $alm->documento != null ? $alm->direccion : ''; ?>" class="form-control" placeholder="Ingrese su correo" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Password</label>
		<input type="text" name="Password" value="<?php echo $alm->documento != null ? $alm->password : ''; ?>" class="form-control" placeholder="Ingrese su correo" data-validacion-tipo="requerido|min:3"/>
	</div>
	
	<div class="from-group">
		<label>Fecha de nacimiento</label>
		<input readonly type="text" name="FechaNacimiento" value="<?php echo $alm->documento != null ? $alm->fecha_nacimiento : ''; ?>" class="form-control datepicker" id="datepicker" placeholder="Ingrese fecha de nacimiento" required />
	</div>	
	
	<hr/>
	<div class="text-right">
		<button class="btn btn-success">Guardar</button>
	</div>
	
</form>

<script>
	$(document).ready(function(){
		$("#frm-cliente").submit(function(){
			return $(this).validate();
		});
	});
</script>
<script src="../assets/js/jquery-ui/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>