<?php
//include "funcionesEstacionamiento.php";
include "ClaseEstacionamiento.php";
$patente=$_POST['patente'];
if($patente!=""){
	$ahora=date("Y-m-d H:i");
	GuardarArchivo("\n".$patente."|".$ahora,"estacionados.txt");
	estacionamiento::CrearTabla("estacionados");	//Necesito la clase 
	estacionamiento::CrearTabla("cobrados");        //Necesito la clase
	include "generarAutocompletar.php";

	header("Location: estacionar.php");

} else {
	echo "ERROR en No cargo bien la patente";
	header("Location: estacionarEntrada.php");
}
?>


