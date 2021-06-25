<?php
include_once "funcionesEstacionamiento.php";
class estacionamiento 
{
	public static function saludar(){
		echo "hola<br>";
	}
	public static function leer($entidad){
		$listaDeAutosLeida=LeerArchivo($entidad.".txt","|");
		return $listaDeAutosLeida;
	}
	public static function retornarListadoAutocomplit() {
		$arrayPatentes = estacionamiento::leer("estacionados");
		$listadoRetorno="";
		foreach($arrayPatentes as $datos){
			$listadoRetorno.="\"$datos[0]\","; 
		}
		return $listadoRetorno;
	}

	public static function DescargarTicket($nroPatente, $fInicio, $fFinal, $ImporteFinal=0){

		$renglones="";
		$renglones.= "Nro de Patente : \n". $nroPatente . "\n";
		$renglones.= "Hora de Entrada: \n". $fInicio . "\n";
		$renglones.= "Hora de Salida : \n". $fFinal . "\n";
		$renglones.= "\n";
		$renglones.= "El vehiculo estuvo estacionado : \n";
		$renglones.= DiferenciaDeFechas($fInicio, $fFinal, "%d Dias %h hora %i minutos") . "\n" ;
		$renglones.= "El precio x minuto $2.- <br> TOTAL A PAGAR  : \n $" . $ImporteFinal;
		estacionamiento::creaArchivoTXT("ticket",$renglones);
	}
	public static function creaArchivoTXT($nombreArchivo,$valores){
		header("Content-Description: File Transfer");
		header("Content-Type: application/force-download");
		header("Content-Disposition: attachment; filename=" . $nombreArchivo. ".txt");
		echo $valores;
	}

	public static function CrearTabla($bandera) {
		$listado=estacionamiento::leer($bandera);

		$tablaHTML="<table border=1>";
		switch ($bandera) {
			case 'estacionados':
				$tablaHTML.="<th>patente</th><th>Ingreso</th><th>Imagen</th>";
				break;
			case 'cobrados':
				$tablaHTML.="<th>patente</th><th>Ingreso</th><th>Salida</th><th>Importe</th>";
				break;
		}
		foreach($listado as $auto){
			switch ($bandera) {
				case 'estacionados':
					$tablaHTML.="<tr><td>$auto[0]</td><td>$auto[1]</td><td><img src='imagenes/$auto[0].jpg' alt='no tiene imagen' width='100'></td></tr>";					
					$archivoSalida="tablaestacionados.php";
					break;
				case 'cobrados':
					$tablaHTML.="<tr><td>$auto[0]</td><td>$auto[1]</td><td>$auto[2]</td><td>$auto[3]</td></tr>";
					$archivoSalida="tablacobrados.php";
					break;
			}
		}

		$tablaHTML.="</table>";
		$archivo=fopen($archivoSalida,"w");
		fwrite($archivo,$tablaHTML);
		fclose($archivo);
	}
	public static function CrearTablaP9($condicion) {
		$listado=estacionamiento::leer("estacionados");

		$tablaHTML="<table border=1>";
		$tablaHTML.="<th>patente</th><th>Ingreso</th><th>Empleado</th><th>Imagen</th>";

		if($condicion=="T"){
			foreach($listado as $auto){
				$tablaHTML.="<tr><td>$auto[0]</td><td>$auto[1]</td><td>$auto[4]</td><td><img src='imagenes/$auto[0].jpg' alt='no tiene imagen' width='100'></td></tr>";	
			}
		} else {
			foreach($listado as $auto){
				if($auto[4]==$_COOKIE["usuario"]){
					$tablaHTML.="<tr><td>$auto[0]</td><td>$auto[1]</td><td>$auto[4]</td><td><img src='imagenes/$auto[0].jpg' alt='no tiene imagen' width='100'></td></tr>";	

				}
			}

		}
		$archivoSalida="tablaestacionadosEmpleados.php";

		$tablaHTML.="</table>";
		$archivo=fopen($archivoSalida,"w");
		fwrite($archivo,$tablaHTML);
		fclose($archivo);
	}

	public static function GuardarListado($arrayListado){
		$archivo=fopen("estacionados.txt","w");
		foreach($arrayListado as $auto){
			if (isset($auto[1])){
				fwrite($archivo,$auto[0] . "|" . $auto[1] . "\n");				
			}
		} 
		fclose($archivo);
	}

}


?>