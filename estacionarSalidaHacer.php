<?php
	function DiferenciaDeFechas($fecha1 , $fecha2 , $formato = '%i' ) 
	{
	    $fechaHora1 = date_create($fecha1);
	    $fechaHora2 = date_create($fecha2);
	    $diferencia = date_diff($fechaHora1, $fechaHora2);
	    return $diferencia->format($formato);
	}

	date_default_timezone_set("America/Argentina/Buenos_Aires");

	if (isset($_POST['patente'])) {
		$patente=$_POST['patente'];
	}else {
		die();
	}

	$matrizDePatentes=array();

	$archivo=fopen("patentes.txt","r");
	while (!feof($archivo)) {
		$renglon=fgets($archivo);
		$registroActual=explode("|", $renglon);
		if(isset($registroActual[1]))
		{
			$matrizDePatentes[]=$registroActual;
		}
	}
	fclose($archivo);

	$ingreso="NO";
	foreach ($matrizDePatentes as $datos) 
	{
		if($datos[0]==$patente){
			$ingreso="SI";
			$fechaIni=$datos[1]; //Fecha y hora entrada
			$fechaFin=date("Y-m-d H:i"); //Fecha y hora Salida

			$hora = DiferenciaDeFechas($fechaIni, $fechaFin, "%h");
			$minutos = DiferenciaDeFechas($fechaIni, $fechaFin, "%i");
			echo "Nro de Patente : ". $datos[0] . "<br>";
			echo "Hora de Entrada: " . $fechaIni . "<br>";
			echo "Hora de Salida : " . $fechaFin . "<br>";
			echo "<br>";
			echo "El vehiculo estuvo estacionado : ";
			echo DiferenciaDeFechas($fechaIni, $fechaFin, "%h hora %i minutos") . "<br>" ;

			if($hora>0) {
				$minutos = $minutos + $hora * 60 ;
			}
			echo "El precio x minuto $2.- <br> TOTAL A PAGAR  : $" . $minutos*2;
			break;
		}
	}
	if($ingreso=="NO") {
			echo "La Patente : ". $patente . " NO FUE ENCONTRADA ... <br>";
	}
?>
