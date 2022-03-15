<h1 class="page-header">Horario</h1>

<div class="well well-sm text-right">
	<a class="btn btn-primary" href="?c=Main">Indice</a>
	<a class="btn btn-primary" href="?c=Horario&a=Crud">
	<img src="../assets/images/icons8-add-96.png" alt="Nuevo Horario" style="width:20px;height:20px"> Agregar
	</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th style="width:20%;">Numero</th>
			<th style="width:30%;">Hora de inicio</th>
			<th style="width:30%;">Hora de finalización</th>
			<th style="width: 60;"></th>
			<th style="width: 60;"></th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach($this->model->Listar() as $r):
		?>
		<tr>
			<td>
				<?php
					echo $r->numero_horario;
				?>
			</td>
			<td>
				<?php
					echo $r->hora_inicio;
				?>
			</td>
			<td>
				<?php
					echo $r->hora_fin;
				?>
			</td>
			<td>
				<a href="?c=Horario&a=Crud&id=<?php echo $r->numero_horario; ?>">
				<img src="../assets/images/icons8-maintenance-60.png" style="width:25px;height:25px">
				Editar</a>
			</td>
			<td>
				<a onclick="javascript: return confirm('¿Esta seguro de que desea eliminar este registro?');" href="?c=Horario&a=Eliminar&id= <?php echo $r->numero_horario; ?>">
				<img src="../assets/images/icons8-delete-200.png" style="width:25px;height:25px">
				Eliminar</a>
			</td>
		</tr>
		<?php
			endforeach;
		?>
	</tbody>
</table>