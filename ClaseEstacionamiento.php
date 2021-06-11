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

	public static function CrearTabla($bandera) {
		$listado=estacionamiento::leer($bandera);

		$tablaHTML="<table border=1>";
		switch ($bandera) {
			case 'estacionados':
				$tablaHTML.="<th>patente</th><th>Ingreso</th>";
				break;
			case 'cobrados':
				$tablaHTML.="<th>patente</th><th>Ingreso</th><th>Salida</th><th>Importe</th>";
				break;
		}
		foreach($listado as $auto){
			switch ($bandera) {
				case 'estacionados':
					$tablaHTML.="<tr><td>$auto[0]</td><td>$auto[1]</td></tr>";
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