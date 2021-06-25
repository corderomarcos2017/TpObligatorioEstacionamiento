<?php
include "ClaseEstacionamiento.php";
if(isset($_POST['elegir'])) {
	$elegir=$_POST['elegir'];	
} else {
	die();
}

switch ($elegir) {
	case '1':
      	estacionamiento::CrearTablaP9("T");  
		break;
	case '2':
      	estacionamiento::CrearTablaP9($_COOKIE["usuario"]);  
		break;
}

include "tablaestacionadosEmpleados.php";

?>


