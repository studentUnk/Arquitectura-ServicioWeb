<?php
require_once '../model/pelicula.php';

class PeliculaController{
	private $model;
	
	public function __CONSTRUCT(){
		$this->model = new Pelicula();
	}
	
	public function Index(){
		require_once('../view/header.php');
		require_once '../view/registros/pelicula/pelicula.php';
		require_once '../view/footer.php';
	}
	
	public function Crud(){
		$mat = new Pelicula();
		if (isset($_REQUEST['numero'])){
			$mat = $this->model->Obtener($_REQUEST['numero']);
			//$mat = this->model->Obtener($_REQUEST['id']);
		}
		require_once '../view/header.php';
		require_once '../view/registros/pelicula/pelicula-editar.php';
		require_once '../view/footer.php';
	}
	
	public function Guardar(){
		$mat = new Pelicula();
		$mat->numero = $_REQUEST['numero'];
		$mat->Nombre = $_REQUEST['Nombre'];
		$mat->Director = $_REQUEST['Director'];
		$mat->FechaPublicacion = $_REQUEST['FechaPublicacion'];
		$mat->Duracion = $_REQUEST['Duracion'];
		
		$mat->numero > 0
		? $this->model->Actualizar($mat)
		: $this->model->Registrar($mat);
		
		header('Location: index.php');
	}
	
	public function Eliminar(){
		$this->model->Eliminar($_REQUEST['numero']);
		header('Location: index.php');
	}
	
}