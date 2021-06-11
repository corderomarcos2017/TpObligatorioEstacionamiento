<?php
	function DiferenciaDeFechas($fecha1 , $fecha2 , $differenceFormat = '%a' ){
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
	function QuitarUltimoCaracter($dato){
		$total = strlen($dato);
		if ($total==17){
			$total = $total -1;
		}
		return substr($dato,0,$total);
	}
	function CrearArchivo($NomArchivo){
		$archivo=fopen($NomArchivo,"w");
		fwrite($archivo, "");
		fclose($archivo);
	}
	function GuardarArchivo($renglon,$NomArchivo){
		$archivo=fopen($NomArchivo,"a");
		fwrite($archivo, $renglon);
		fclose($archivo);
	}
	function LeerArchivo($NomArchivo,$separador) {
		$matrizDeRetorno=array();
		$archivo=fopen($NomArchivo,"r");
		while (!feof($archivo)) {
			$renglon=fgets($archivo);
			$registroActual=explode($separador, $renglon);
			if(isset($registroActual[1])){
				$matrizDeRetorno[]=$registroActual;
			}
		}
		fclose($archivo);
		return $matrizDeRetorno;
	}
	function CalcularTotal($fInicio, $fFinal){
		$dia = DiferenciaDeFechas($fInicio, $fFinal, "%d");
		$hora = DiferenciaDeFechas($fInicio, $fFinal, "%h");
		$minutos = DiferenciaDeFechas($fInicio, $fFinal, "%i");
		
		$totalXdia = $dia * 2000 ;
		$totalXhora = $hora	* 100 ;
		$totalXminutos = $minutos * 2;

		$final = $totalXdia + $totalXhora + $totalXminutos;		

		return $final;
	}
	function MostrarResultados($nroPatente, $fInicio, $fFinal, $ImporteFinal=0){
		echo "Nro de Patente : ". $nroPatente . "<br>";
		echo "Hora de Entrada: " . $fInicio . "<br>";
		echo "Hora de Salida : " . $fFinal . "<br>";
		echo "<br>";
		echo "El vehiculo estuvo estacionado : ";
		echo DiferenciaDeFechas($fInicio, $fFinal, "%d Dias %h hora %i minutos") . "<br>" ;
		echo "El precio x minuto $2.- <br> TOTAL A PAGAR  : $" . $ImporteFinal;
	}


	function generarUnCSV($nombreArchivo,$separador) {
		$arrayTemporal=LeerArchivo($nombreArchivo.".txt", $separador);
		$renglones="";
		foreach ($arrayTemporal as $datos){
			for ($columna=0;$columna<count($datos);$columna++ ){
				$renglones.=$datos[$columna];
				if ($columna<count($datos)-1){
					$renglones.=";";
				}	
			}
		}
		creaArchivocsv($nombreArchivo,$renglones);
	}

	/*
	function generarCobrados() {
		$arrayTemporal=LeerArchivo("cobrados.txt", "|");
		$renglones="";
		foreach ($arrayTemporal as $datos){
			$renglones.=$datos[0].";".$datos[1].";".$datos[2].";".$datos[3];
		}
		creaArchivocsv("cobrados",$renglones);
	}
	function generarEstacionados() {
		$arrayTemporal=LeerArchivo("estacionados.txt", "|");
		$renglones="";
		foreach ($arrayTemporal as $datos){
			$renglones.=$datos[0].";".$datos[1];
		}
		creaArchivocsv("estacionados",$renglones);
	}
	function generarUsuarios() {
		$arrayTemporal=LeerArchivo("usuario.txt", "|");
		$renglones="";
		foreach ($arrayTemporal as $datos){
			$renglones.=$datos[0].";".$datos[1].";".$datos[2];
		}
		creaArchivocsv("usuarios",$renglones);
	}
	*/

	function creaArchivocsv($nombreArchivo,$valores){
		header("Content-Description: File Transfer");
		header("Content-Type: application/force-download");
		header("Content-Disposition: attachment; filename=" . $nombreArchivo. ".csv");
		echo $valores;
	}

	date_default_timezone_set("America/Argentina/Buenos_Aires");
?>
