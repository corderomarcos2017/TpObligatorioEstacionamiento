<?php

	include "ClaseEstacionamiento.php";

	if (isset($_POST['patente'])) {
		$patente=$_POST['patente'];
	}else {
		die();
	}



	//$matrizDePatentes=LeerArchivo("estacionados.txt", "|");
	$matrizDePatentes=estacionamiento::leer("estacionados");

	$ingreso="NO";
	foreach ($matrizDePatentes as $datos){
		if($datos[0]==$patente){
			$ingreso="SI";
			$fechaIni=$datos[1];           //Fecha y hora entrada
			$fechaFin=date("Y-m-d H:i");   //Fecha y hora Salida
			$gnc=$datos[2];  
			$vehiculo=$datos[3];
			$precio=CalcularTotal($fechaIni, $fechaFin,$vehiculo);

			//MostrarResultados($patente, $fechaIni, $fechaFin, $precio);
			estacionamiento::DescargarTicket($patente, $fechaIni, $fechaFin, $precio);
			GuardarArchivo("\n".$patente."|".$fechaIni."|".$fechaFin."|".$precio."|".$gnc."|".$vehiculo."|".$_COOKIE["usuario"],"cobrados.txt"); //Cobrados
			break;
		}
	}

	if($ingreso=="NO") {
		echo "La Patente : ". $patente . " NO FUE ENCONTRADA ... <br>";
	} else {
		//Volver a guardar el archivo de pantentes
		CrearArchivo("estacionados.txt");
		foreach ($matrizDePatentes as $datos){
			if($datos[0]!=$patente){
				GuardarArchivo("\n".$datos[0]."|".$datos[1]."|".$datos[2]."|".$datos[3]."|".$datos[4]."|X","estacionados.txt"); 
			}
		}
		estacionamiento::CrearTabla("estacionados");	
		estacionamiento::CrearTabla("cobrados");   
		//header("Location: estacionarSalida.php");
	}
?>
