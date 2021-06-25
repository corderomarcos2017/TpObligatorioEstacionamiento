<?php
//include "funcionesEstacionamiento.php";
include "ClaseEstacionamiento.php";
if(isset($_POST['patente'])) {
	$patente=$_POST['patente'];	
	$gnc=$_POST['gnc'];	
	$vehiculo=$_POST['vehiculo'];	//moto/auto/camioneta
} else {
	die();
}

if($vehiculo=="moto" && $gnc=="gnc") {
	//echo "ERROR DE ENTRADA!!! NO SE PUEDE CARGAR MOTO CON GNC";
	//header("Location: estacionarEntrada.php");
	echo "<script>alert('ERROR DE ENTRADA!!! NO SE PUEDE CARGAR MOTO CON GNC');</script>";

} else {
	if($patente!=""){
		$ahora=date("Y-m-d H:i");
		if($gnc=="gnc") {
			$GuardarTieneGNC="SIGNC";
		}else {
			$GuardarTieneGNC="NOGNC";		
		}
		GuardarArchivo("\n".$patente."|".$ahora."|".$GuardarTieneGNC."|".$vehiculo."|X","estacionados.txt");
		estacionamiento::CrearTabla("estacionados");	//Necesito la clase 
		estacionamiento::CrearTabla("cobrados");        //Necesito la clase
		include "generarAutocompletar.php";

		header("Location: estacionar.php");

	} else {
		echo "ERROR en No cargo bien la patente";
		header("Location: estacionarEntrada.php");
	}
}
?>


