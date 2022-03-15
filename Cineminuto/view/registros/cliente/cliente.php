<h1 class="page-header">Cliente</h1>

<div class="well well-sm text-right">
	<a class="btn btn-primary" href="?c=Main">Indice</a>
	<a class="btn btn-primary" href="?c=Cliente&a=Crud">
	<img src="../assets/images/icons8-add-96.png" alt="Nuevo Cliente" style="width:20px;height:20px"> Agregar
	</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th style="width:9%;">Documento</th>
			<th style="width:9%;">Nombre</th>
			<th style="width:9%;">Apellido</th>
			<th style="width:9%;">Genero</th>
			<th style="width:9%;">Celular</th>
			<th style="width:9%;">Telefono</th>
			<th style="width:9%;">Correo</th>
			<th style="width:9%;">Direccion</th>
			<th style="width:9%;">Password</th>
			<th style="width:9%;">Fecha Nacimiento</th>
			<th style="width: 5%;"></th>
			<th style="width: 5%;"></th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach($this->model->Listar() as $r):
		?>
		<tr>
			<td>
				<?php
					echo $r->documento;
				?>
			</td>
			<td>
				<?php
					echo $r->nombre;
				?>
			</td>
			<td>
				<?php
					echo $r->apellido;
				?>
			</td>
			<td>
				<?php
					echo $r->genero;
				?>
			</td>
			<td>
				<?php
					echo $r->celular;
				?>
			</td>
			<td>
				<?php
					echo $r->telefono;
				?>
			</td>
			<td>
				<?php
					echo $r->correo;
				?>
			</td>
			<td>
				<?php
					echo $r->direccion;
				?>
			</td>
			<td>
				<?php
					echo $r->password;
				?>
			</td>
			<td>
				<?php
					echo $r->fecha_nacimiento;
				?>
			</td>
			<td>
				<a href="?c=Cliente&a=Crud&id=<?php echo $r->documento; ?>">
				<img src="../assets/images/icons8-maintenance-60.png" style="width:25px;height:25px">
				Editar</a>
			</td>
			<td>
				<a onclick="javascript: return confirm('¿Esta seguro de que desea eliminar este registro?');" href="?c=Cliente&a=Eliminar&id=
					<?php
						echo $r->documento;
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