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
	function CalcularTotal($fInicio, $fFinal,$fvehiculo){
		$dia = DiferenciaDeFechas($fInicio, $fFinal, "%d");
		$hora = DiferenciaDeFechas($fInicio, $fFinal, "%h");
		$minutos = DiferenciaDeFechas($fInicio, $fFinal, "%i");
		
		//precio base de motos
		$totalXdia = $dia * 2000 ;
		$totalXhora = $hora	* 100 ;
		$totalXminutos = $minutos * 2;
		$final = $totalXdia + $totalXhora + $totalXminutos;		

		//pregunto si es auto o camioneta
		switch ($fvehiculo){
			case 'auto': //si es auto, incremento un 10% el $final
				$final = $final * 1.1;
				break;
			case 'camioneta': //si es auto, incremento un 20% el $final
				$final = $final * 1.2;
				break;
		}
		return $final;
	}
	function MostrarResultados($nroPatente, $fInicio, $fFinal, $ImporteFinal=0){
		echo "Nro de Patente : <br>". $nroPatente . "<br>";
		echo "Hora de Entrada: <br>" . $fInicio . "<br>";
		echo "Hora de Salida : <br>" . $fFinal . "<br>";
		echo "<br>";
		echo "El vehiculo estuvo estacionado : <br>";
		echo DiferenciaDeFechas($fInicio, $fFinal, "%d Dias %h hora %i minutos") . "<br>" ;
		echo "El precio x minuto $2.- <br> TOTAL A PAGAR  : <br> $" . $ImporteFinal;
		//echo "<br>Son pesos :<br>". letras($ImporteFinal);
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
function CalcularTotales($nombreArchivo)
{
	$listadoDeCobrados =  leerEntrada ($nombreArchivo,"=>");
	$totales = 0;

	foreach ($listadoDeCobrados as $dato) {
		$totales +=$dato[3];
	}
	return $totales;
}

function letras($numero) {
        /* 
         fuente que  convierte un numero en letras.
         el rango de <expn> es de  0  a  999.999.999.999.999
         devuelve un valor de tipo String.
         ===============================================================
        */
        //--- Creo un array 6 elemento para poder trabajar del 1 al 5 ------
        $array=["","111","222","333","444","555"];

        //--- Descarto todos los espacios en blanco y lleno con 0 adelante de la sifra
        $entero = trim($numero);
        $entero = str_repeat("0", 15 - strlen($entero)) . $entero;

        //--- separar la cifra en 5 $array ------
        $inicio=12;
        for($indice=5;$indice>=1;$indice--){
            $array[$indice]=substr($entero, $inicio,3);
            $inicio -= 3 ;
        }        

        //--- proceso de union ----------------
        $enletra = "";
        for($indice=1;$indice<=5;$indice++) {
            $unidad  = substr($array[$indice], 2);
            $decena  = substr($array[$indice], 1, 1);
            $centena = substr($array[$indice], 0, 1);

            //------ determino las $unidades ---
            switch ($unidad) {
                case 0: if($indice==1 && $entero<1) $unilet="cero ";else $unilet ="";
                    break;
                case 1: 
                    if($decena=="1") {
                       $unilet="once ";
                    }elseif ($array[$indice]=="001" && ($indice==2 || $indice==4)){
                       $unilet=" ";
                    }elseif ($indice>2) {
                       $unilet="un ";
                    }else {
                       $unilet="uno ";
                    }
                    break;
                case 2: if($decena=="1") $unilet="doce ";else $unilet="dos "; 
                    break;
                case 3: if($decena=="1") $unilet="trece ";else $unilet="tres "; 
                    break;
                case 4: if($decena=="1") $unilet="catorce ";else $unilet="cuatro ";
                    break;
                case 5: if($decena=="1") $unilet="quince ";else $unilet="cinco ";
                    break;
                case 6: if($decena=="1") $unilet="dieciseis ";else $unilet="seis ";
                    break;
                case 7: if($decena=="1") $unilet="diecisiete ";else $unilet="siete ";
                    break;
                case 8: if($decena=="1") $unilet="dieciocho ";else $unilet="ocho ";
                    break;
                case 9: if($decena=="1") $unilet="diecinueve ";else $unilet="nueve ";
                    break;
            }
            //------ determino las $decenas ---
            switch($decena){
                case 0: $declet = "";
                        break;
                case 1: if($unidad=="0") $declet="diez ";else $declet="";
                        break;
                case 2: if($unidad=="0") $declet="veinte ";else $declet="veinti";   
                        break;
                case 3: if($unidad=="0") $declet="treinta ";else $declet="treinta y ";
                        break;
                case 4: if($unidad=="0") $declet="cuarenta ";else $declet="cuarenta y ";
                        break;
                case 5: if($unidad=="0") $declet="cincuenta ";else $declet="cincuenta y ";
                        break;
                case 6: if($unidad=="0") $declet="sesenta ";else $declet="sesenta y ";
                        break;
                case 7: if($unidad=="0") $declet="setenta ";else $declet="setenta y ";
                        break;
                case 8: if($unidad=="0") $declet="ochenta ";else $declet="ochenta y ";
                        break;
                case 9: if($unidad=="0") $declet="noventa ";else $declet="noventa y ";
                        break;
            }
            //------ determino la $centenas ---
            switch($centena){
                case 0: $cenlet = "";
                    break;
                case 1: if($decena&$unidad=="00") $cenlet="cien "; else $cenlet = "ciento ";
                    break;
                case 2: $cenlet = "doscientos ";
                    break;
                case 3: $cenlet = "trescientos ";
                    break;
                case 4: $cenlet = "cuatrocientos ";
                    break;
                case 5: $cenlet = "quinientos ";
                    break;
                case 6: $cenlet = "seiscientos ";
                    break;
                case 7: $cenlet = "setecientos ";
                    break;
                case 8: $cenlet = "ochocientos ";
                    break;
                case 9: $cenlet = "novecientos ";
                    break;
            }
            //------ determino los $conectores ej: mil o millones ---
            switch($indice){
                case 5: 
                    $conect = "";
                    break;
                case 4: 
                    if($array[4] == "000"){
                      $conect = ""; 
                    }else {
                      $conect = "mil "; 
                    }  
                    break;
                case 3: 
                    if($array[3] == "000"){
                        $conect = "";                                         
                    } else {            
                        if($array[3] == "001"){
                            $conect = "millon ";        
                        } else {
                            $conect = "millones ";        
                        }
                    }
                    break;
                case 2: 
                    if($array[2] == "000"){
                      $conect = ""; 
                    }else {
                      $conect = "mil "; 
                    }  
                    break;
                case 1: 
                    if($array[1] == "000"){
                      $conect = "";   
                    }else {
                        if($array[1] == "001"){
                            $conect = "billon ";        
                        } else {
                            $conect = "billones ";        
                        }
                    }  
                    break;
            }
            //------- union de todos los $indice para forma la fraze -------
            $enletra .= $cenlet . $declet . $unilet . $conect;
        }
        return $enletra;
    }

	date_default_timezone_set("America/Argentina/Buenos_Aires");
?>
