<?php
	if (isset($_POST['patente'])) {
		$patente=$_POST['patente'];
	}else {
		die();
	}

	include "ClaseEstacionamiento.php";
	$matrizDePatentes=estacionamiento::leer("estacionados");

	$ingreso="NO";
	$directorio = 'imagenes/';


	foreach ($matrizDePatentes as $datos){
		if($datos[0]==$patente){
			$ingreso="SI";
			$subir_archivo=$directorio.$patente.".jpg";
			echo "<div>";
			if (move_uploaded_file($_FILES['archivoImagen']['tmp_name'], $subir_archivo)) {
		       echo "El archivo es válido y se cargó correctamente.<br><br>";
			   echo"<a href='".$subir_archivo."' target='_blank'><img src='".$subir_archivo."' width='150'></a>";
		    } else {
		       echo "La subida ha fallado";
		    }
		    echo "</div>";
			break;
		}
	}

	if($ingreso=="NO") {
		echo "La Patente : ". $patente . " NO FUE ENCONTRADA ... <br>";
	}
?>
