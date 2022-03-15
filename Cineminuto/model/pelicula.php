<?php
Class Pelicula {
	private $pdo;
	
	public $numero_pelicula;
	public $Nombre;
	public $Director;
	public $Fecha_publicacion;
	public $Duracion;
	
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
			$stm = $this->pdo->prepare("SELECT * FROM pelicula");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Obtener($Numero_pelicula){
		try{
			$stm = $this->pdo->prepare("SELECT * FROM pelicula WHERE Numero_pelicula = ?");
			$stm->execute(array($Numero_pelicula));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
		
	}
	
	public function Eliminar($Numero_pelicula){
		try{
			$stm = $this->pdo->prepare("DELETE FROM pelicula WHERE numero_pelicula = ?");
			$stm->execute(array($Numero_pelicula));
		} catch (Exception $e){
			echo "DELETE FROM pelicula WHERE numero_pelicula = " . $Numero_pelicula;
			die($e->getMessage());
		}
	}
	
	public function Actualizar($data){
		try {
			$sql = "UPDATE pelicula SET " .
				"Nombre = ?, " .
				"Director = ?, " .
				"Fecha_publicacion = ?, " .
				"Duracion = ? " .
				"WHERE Numero_pelicula = ?";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->Nombre,
					$data->Director,
					$data->FechaPublicacion,
					$data->Duracion,
					$data->numero
				)
			);	
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Registrar(Pelicula $data){
		try{
			$sql = "INSERT INTO pelicula (" .
				"Numero_pelicula, ".
				"Nombre, ".
				"Director, " .
				"Fecha_publicacion, " .
				"Duracion" .
				") " .
				"VALUES (NULL,?,?,?,?)";
			$this->pdo->prepare($sql)->execute(
				array(
					//$data->numero,
					$data->Nombre,
					$data->Director,
					$data->FechaPublicacion,
					$data->Duracion
				)
			);
					
		}catch (Exception $e){
			die($e->getMessage());
		}
	}
	
}