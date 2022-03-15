<?php
Class Horario {
	private $pdo;
	
	public $numero_horario;
	public $Hora_inicio;
	public $Hora_fin;
	
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
			$stm = $this->pdo->prepare("SELECT * FROM horario");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Obtener($Numero_horario){
		try{
			$stm = $this->pdo->prepare("SELECT * FROM horario WHERE Numero_horario = ?");
			$stm->execute(array($Numero_horario));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
		
	}
	
	public function Eliminar($Numero_horario){
		try{
			$stm = $this->pdo->prepare("DELETE FROM horario WHERE Numero_horario = ?");
			$stm->execute(array($Numero_horario));
		} catch (Exception $e){
			echo "DELETE FROM horario WHERE Numero_horario = " . $Numero_horario;
			die($e->getMessage());
		}
	}
	
	public function Actualizar($data){
		try {
			$sql = "UPDATE horario SET " .
				"Hora_inicio = ?, " .
				"Hora_fin = ? " .
				"WHERE Numero_horario = ?";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->Hora_inicio,
					$data->Hora_fin,
					$data->numero_horario
				)
			);	
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Registrar(Horario $data){
		try{
			$sql = "INSERT INTO horario (" .
				"Numero_horario " . "," . 
				"Hora_inicio " . "," .
				"Hora_fin" .
				") " .
				"VALUES (NULL,?,?)";
			$this->pdo->prepare($sql)->execute(
				array(
					//$data->Numero_horario,
					$data->Hora_inicio,
					$data->Hora_fin
				)
			);
					
		}catch (Exception $e){
			die($e->getMessage());
		}
	}
	
}