<?php
	if (isset($_POST['correo']) && isset($_POST['clave'])) {
		$mail=$_POST['correo'];
		$clave=$_POST['clave'];
	}else {
		die();
	}
	
	include "ClaseEstacionamiento.php";
	$listadoDeUsuarios=LeerArchivo("usuario.txt","|");
	$ingreso="NO";
	foreach ($listadoDeUsuarios as $datos) {
		if($datos[0]==$mail){
			if($datos[1]==$clave){
				echo "Bienvenido....";
				setcookie("usuario",$datos[0]);
				
				header("Location: estacionarEntrada.php?usuario=$datos[0]");
				$ingreso="SI";
				break;
			}
		}
	}
	if($ingreso=="NO"){
		echo "Datos erroneos ...";
	}
?>


