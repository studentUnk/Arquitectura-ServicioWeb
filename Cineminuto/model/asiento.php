<?php
Class Asiento {
	private $pdo;
	
	public $Numero_sala;
	public $Numero_asiento;
	public $Disponible;
	
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
			$stm = $this->pdo->prepare("SELECT * FROM asiento");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	'''
	Obtener asientos asociados a una sala
	'''
	public function Obtener($Numero_sala){
		try{
			$stm = $this->pdo->prepare("SELECT * FROM asiento " .
				"WHERE " .
				"Numero_sala = ?");
			$stm->execute(array($Numero_sala));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}		
	}
	
	'''
	Eliminar asiento asociado a una sala
	'''
	public function Eliminar($data){
		try{
			$sql = "DELETE FROM asiento " .
				"WHERE " .
				"Numero_sala = ? " .
				"AND " . "Numero_asiento = ?";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->Numero_sala,
					$data->Numero_asiento
				)
			);
			
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	'''
	Actualizar disponibilidad de un asiento
	'''
	public function Actualizar($data){
		try {
			$sql = "UPDATE asiento SET " .
				"Disponible = ? " .
				"WHERE Numero_sala = ? "
				"AND " . "Numero_asiento = ? ";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->Disponible,
					$data->Numero_sala,
					$data->Numero_asiento					
				)
			);	
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Registrar(Asiento $data){
		try{
			$sql = "INSERT INTO asiento (" .
				"Disponible, " .
				"Numero_sala, " .
				"Numero_asiento" .
				") " .
				"VALUES (?,?,?)";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->Disponible,
					$data->Numero_sala,
					$data->Numero_asiento
				)
			);
					
		}catch (Exception $e){
			die($e->getMessage());
		}
	}
	
}