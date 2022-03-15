<?php
Class Cliente {
	private $pdo;
	
	public $documento;
	public $Nombre;
	public $Apellido;
	public $Genero;
	public $Celular;
	public $Telefono;
	public $Correo;
	public $Direccion;
	public $Password;
	public $FechaNacimiento;
	
	public function __CONSTRUCT(){
		try{
			$this->pdo = Database::StartUp();
		} catch (Exception $e) {
			die($e->getMessage());
		}
		
	}
	
	public function Listar(){
		try{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM cliente");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Obtener($documento){
		try{
			$stm = $this->pdo->prepare("SELECT * FROM cliente WHERE documento = ?");
			$stm->execute(array($documento));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
		
	}
	
	public function Eliminar($documento){
		try{
			$stm = $this->pdo->prepare("DELETE FROM cliente WHERE documento = ?");
			$stm->execute(array($documento));
		} catch (Exception $e){
			echo "DELETE FROM cliente WHERE documento = " . $documento;
			die($e->getMessage());
		}
	}
	
	public function Actualizar($data){
		try {
			$sql = "UPDATE cliente SET " .
				"Nombre = ? " . "," .
				"Apellido = ? " . "," .
				"Genero = ? " . "," .
				"Celular = ? " . "," .
				"Telefono = ? " . "," .
				"Correo = ? " . "," .
				"Direccion = ? " . "," .
				"Password = ? " . "," .
				"Fecha_Nacimiento = ? " .
				"WHERE Documento = ?";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->Nombre,
					$data->Apellido,
					$data->Genero,
					$data->Celular,
					$data->Telefono,
					$data->Correo,
					$data->Direccion,
					$data->Password,
					$data->FechaNacimiento,
					$data->Documento
				)
			);	
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Registrar(Cliente $data){
		try{
			$sql = "INSERT INTO cliente (" .
				"Documento," .
				"Nombre," .
				"Apellido," .
				"Genero," . 
				"Celular," .
				"Telefono," .
				"Correo," .
				"Direccion," .
				"Password," .
				"Fecha_Nacimiento" .
				") " .
				"VALUES (?,?,?,?,?,?,?,?,?,?)";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->Documento,
					$data->Nombre,
					$data->Apellido,
					$data->Genero,
					$data->Celular,
					$data->Telefono,
					$data->Correo,
					$data->Direccion,
					$data->Password,
					$data->FechaNacimiento
				)
			);
					
		}catch (Exception $e){
			die($e->getMessage());
		}
	}
	
}