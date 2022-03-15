<?php
require_once '../model/database.php';

//$controller = 'alumno';
$controller = 'main';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "../controller/registros/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
	$accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
	
	/*switch($controller){
		case 'Alumno':
			require_once "../controller/$controller.controller.php";
			break;			
		case 'Profesor':
			
			break;
		case 'Indice':
			require_once "..
			break;
	}*/
    
    // Instanciamos el controlador
    require_once "../controller/registros/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}