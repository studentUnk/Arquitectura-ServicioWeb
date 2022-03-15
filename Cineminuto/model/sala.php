<?php
Class Sala {
	private $pdo;
	
	public $Numero_sala;
	public $Nombre_sala;
	public $Tipo_sala;
	
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
			$stm = $this->pdo->prepare("SELECT * FROM sala");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Obtener($Numero_sala){
		try{
			$stm = $this->pdo->prepare("SELECT * FROM sala WHERE Numero_sala = ?");
			$stm->execute(array($Numero_sala));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
		
	}
	
	public function Eliminar($Numero_sala){
		try{
			$stm = $this->pdo->prepare("DELETE FROM sala WHERE Numero_sala = ?");
			$stm->execute(array($Numero_sala));
		} catch (Exception $e){
			echo "DELETE FROM sala WHERE Numero_sala = " . $Numero_sala;
			die($e->getMessage());
		}
	}
	
	public function Actualizar($data){
		try {
			$sql = "UPDATE sala SET " .
				"Nombre_sala = ?, " .
				"Tipo_sala = ? " .
				"WHERE Numero_sala = ?";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->Nombre_sala,
					$data->Tipo_sala,
					$data->Numero_sala
				)
			);	
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Registrar(Sala $data){
		try{
			$sql = "INSERT INTO sala (" .
				"Numero_sala, " .
				"Nombre_sala, " . 
				"Tipo_sala" .
				") " .
				"VALUES (?,?,?)";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->Numero_sala,
					$data->Nombre_sala,
					$data->Tipo_sala
				)
			);
					
		}catch (Exception $e){
			die($e->getMessage());
		}
	}
	
}