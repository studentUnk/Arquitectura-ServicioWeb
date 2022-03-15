<?php
require_once '../model/cliente.php';

class ClienteController{
	private $model;
	
	public function __CONSTRUCT(){
		$this->model = new Cliente();
	}
	
	public function Index(){
		require_once('../view/header.php');
		require_once '../view/registros/cliente/cliente.php';
		require_once '../view/footer.php';
	}
	
	public function Crud(){
		$alm = new Cliente();
		if (isset($_REQUEST['id'])){
			$alm = $this->model->Obtener($_REQUEST['id']);
			//$alm = this->model->Obtener($_REQUEST['id']);
		}
		require_once '../view/header.php';
		require_once '../view/registros/cliente/cliente-editar.php';
		require_once '../view/footer.php';
	}
	
	public function Guardar(){
		$alm = new Cliente();	
		
		$alm->Documento = $_REQUEST['id'];
		$alm->Nombre = $_REQUEST['Nombre'];
		$alm->Apellido = $_REQUEST['Apellido'];
		$alm->Genero = $_REQUEST['Genero'];
		$alm->Celular = $_REQUEST['Celular'];
		$alm->Telefono = $_REQUEST['Telefono'];
		$alm->Correo = $_REQUEST['Correo'];
		$alm->Direccion = $_REQUEST['Direccion'];
		$alm->Password = $_REQUEST['Password'];
		$alm->Fecha_Nacimiento = $_REQUEST['FechaNacimiento'];
		
		$_REQUEST['upin'] > 0
		? $this->model->Actualizar($alm)
		: $this->model->Registrar($alm);
		
		header('Location: index.php');
	}
	
	public function Eliminar(){
		$this->model->Eliminar($_REQUEST['id']);
		header('Location: index.php');
	}
	
}