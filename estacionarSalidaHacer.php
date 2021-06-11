<?php

	//include_once "funcionesEstacionamiento.php";
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
			
			$precio=CalcularTotal($fechaIni, $fechaFin);
			MostrarResultados($patente, $fechaIni, $fechaFin, $precio);
			GuardarArchivo("\n".$patente."|".QuitarUltimoCaracter($fechaIni)."|".$fechaFin."|".$precio,"cobrados.txt"); //Cobrados
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
				GuardarArchivo("\n".$datos[0]."|".QuitarUltimoCaracter($datos[1]),"estacionados.txt"); 
			}
		}
		estacionamiento::CrearTabla("estacionados");	//Necesito la clase 
		estacionamiento::CrearTabla("cobrados");        //Necesito la clase
	}
?>
