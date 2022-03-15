<?php
require_once '../model/horario.php';

class HorarioController{
	private $model;
	
	public function __CONSTRUCT(){
		$this->model = new Horario();
	}
	
	public function Index(){
		require_once('../view/header.php');
		require_once '../view/registros/horario/horario.php';
		require_once '../view/footer.php';
	}
	
	public function Crud(){
		$alm = new Horario();
		if (isset($_REQUEST['id'])){
			$alm = $this->model->Obtener($_REQUEST['id']);
			//$alm = this->model->Obtener($_REQUEST['id']);
		}
		require_once '../view/header.php';
		require_once '../view/registros/horario/horario-editar.php';
		require_once '../view/footer.php';
	}
	
	public function Guardar(){
		$alm = new Horario();
		$alm->numero_horario = $_REQUEST['id'];
		$alm->Hora_inicio = $_REQUEST['HoraInicio'];
		$alm->Hora_fin = $_REQUEST['HoraFin'];
		
		$alm->numero_horario > 0
		? $this->model->Actualizar($alm)
		: $this->model->Registrar($alm);
		
		header('Location: index.php');
	}
	
	public function Eliminar(){
		$this->model->Eliminar($_REQUEST['id']);
		header('Location: index.php');
	}
	
}