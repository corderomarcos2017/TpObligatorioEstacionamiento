<?php
//var_dump($_POST); 

$patente=$_POST['patente'];

if($patente!="")
{
	date_default_timezone_set("America/Argentina/Buenos_Aires");
	$ahora=date("Y-m-d H:i");
	$renglon = "\n".$patente."|".$ahora;
	$archivo=fopen("patentes.txt","a");
	fwrite($archivo, $renglon);
	fclose($archivo);

	header("Location: estacionar.php");

} else {
	echo "ERROR en No cargo bien la patente";
	header("Location: estacionarEntrada.php");
}

?>


