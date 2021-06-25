<?php
	if (isset($_POST['correo']) && isset($_POST['clave'])) {
		$mail=$_POST['correo'];
		$clave=$_POST['clave'];
		$copiaclave=$_POST['copiaclave'];		
	}else {
		die();
	}

include "ClaseEstacionamiento.php";

if($clave==$copiaclave)
{
	$ahora=date("Y-m-d H:i:s");
	$renglon = "\n".$mail."|".$clave."|" . $ahora;
	GuardarArchivo($renglon,"usuario.txt");	
	header("Location: index.php");
} else {
	echo "ERROR en clave, las contraseñas NO coinciden...";
}

?>


