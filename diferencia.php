<?php
	function dateDifference($fecha1 , $fecha2 , $differenceFormat = '%a' )
	{
		/*
		PARA: La fecha debe estar en formato AAAA-MM-DD
		FORMATO DE RESULTADO:
		'% y Año% m Mes% d Día% h Horas% i Minuto% s Segundos' => 1 Año 3 Mes 14 Día 11 Horas 49 Minuto 36 Segundos
		'% y Año% m Mes% d Día' => 1 año 3 mes 14 días
		'% m Mes% d Día' => 3 Mes 14 Día
		'% d Día% h Horas' => 14 Día 11 Horas
		'% d día' => 14 días
		'% h Horas% i Minuto% s Segundos' => 11 Horas 49 Minuto 36 Segundos
		'% i Minuto% s Segundos' => 49 Minuto 36 Segundos
		'% h Horas => 11 Horas
		'% a Días => 468 Días
		*/

	    $fechaHora1 = date_create($fecha1);
	    $fechaHora2 = date_create($fecha2);
	   
	    $interval = date_diff($fechaHora1, $fechaHora2);
	   
	    return $interval->format($differenceFormat);
	   
	}



	date_default_timezone_set("America/Argentina/Buenos_Aires");
	$fechaIni=date('2021-05-24 10:22:11'); //Fecha y hora entrada
	$fechaFin=date("Y-m-d H:i:s"); //Fecha y hora Salida




	echo dateDifference($fechaIni, $fechaFin, "%h hora %i minutos %s segundo") ;


?>