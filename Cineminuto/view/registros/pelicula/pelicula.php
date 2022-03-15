<h1 class="page-header">Pelicula</h1>

<div class="well well-sm text-right">
	<a class="btn btn-primary" href="?c=Main">Indice</a>
	<a class="btn btn-primary" href="?c=Pelicula&a=Crud">
	<img src="../assets/images/icons8-add-96.png" alt="Nueva Pelicula" style="width:20px;height:20px"> Agregar
	</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th style="width:5%;">Numero</th>
			<th style="width:30%;">Nombre</th>
			<th style="width:15%;">Director</th>
			<th style="width:10%;">Fecha</th>
			<th style="width:10%;">Duración</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach($this->model->Listar() as $r):
		?>
		<tr>
			<td>
				<?php
					echo $r->numero_pelicula;
				?>
			</td>
			<td>
				<?php
					echo $r->nombre;
				?>
			</td>
			<td>
				<?php
					echo $r->director;
				?>
			</td>
			<td>
				<?php
					echo $r->fecha_publicacion;
				?>
			</td>
			<td>
				<?php
					echo $r->duracion;
				?>
			</td>
			<td>
				<a href="?c=Pelicula&a=Crud&numero=<?php echo $r->numero_pelicula; ?>">
				<img src="../assets/images/icons8-maintenance-60.png" style="width:25px;height:25px">
				Editar</a>
			</td>
			<td>
				<a onclick="javascript: return confirm('¿Esta seguro de que desea eliminar este registro?');" href="?c=Pelicula&a=Eliminar&numero=
					<?php
						echo $r->numero_pelicula;
					?>">
					<img src="../assets/images/icons8-delete-200.png" style="width:25px;height:25px">
					Eliminar</a>
			</td>
		</tr>
		<?php
			endforeach;
		?>
	</tbody>
</table>