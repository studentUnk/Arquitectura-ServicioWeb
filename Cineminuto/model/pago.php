<?php
Class Pago {
	private $pdo;
	
	public $Numero_pago;
	public $Fecha_pago;
	public $Valor_pagado;
	public $Numero_reserva;
	public $Documento_cliente;
	
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
			$stm = $this->pdo->prepare("SELECT * FROM pago");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Obtener($Numero_pago){
		try{
			$stm = $this->pdo->prepare("SELECT * FROM pago WHERE numero_pago = ?");
			$stm->execute(array($Numero_pago));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
		
	}
	
	public function Eliminar($Numero_pago){
		try{
			$stm = $this->pdo->prepare("DELETE FROM pago WHERE numero_pago = ?");
			$stm->execute(array($Numero_pago));
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Actualizar($data){
		try {
			$sql = "UPDATE pago SET " .
				"Fecha_pago = ?, " .
				"Valor_pagado = ?, " .
				"Numero_reserva = ?, " .
				"Documento_cliente = ? " .
				"WHERE numero_pago = ?";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->Fecha_pago,
					$data->Valor_pagado,
					$data->Numero_reserva,
					$data->Documento_cliente,
					$data->Numero_pago
				)
			);	
		} catch (Exception $e){
			die($e->getMessage());
		}
	}
	
	public function Registrar(Pago $data){
		try{
			$sql = "INSERT INTO pago (" .
				"Numero_pago, " .
				"Fecha_pago, ".
				"Valor_pagado, ".
				"Numero_reserva, ".
				"Documento_cliente" .
				") " .
				"VALUES (?,?,?,?,?)";
			$this->pdo->prepare($sql)->execute(
				array(
					$data->Numero_pago,
					$data->Fecha_pago,
					$data->Valor_pagado,
					$data->Numero_reserva,
					$data->Documento_cliente
				)
			);
					
		}catch (Exception $e){
			die($e->getMessage());
		}
	}
	
}