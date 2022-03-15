<?php
class Database{
	private $db_name = "cineminuto";
	
	public static function StartUp(){
		/*$pdo = new PDO('mysql:host=localhost;dbname= ' .
			$GLOBALS['db_name'] . ';charset=utf8','root','');*/
		$pdo = new PDO('mysql:host=localhost;dbname=cineminuto;charset=utf8','root','');	
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}
}