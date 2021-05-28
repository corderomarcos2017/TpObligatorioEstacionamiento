<?php


	/*var_dump($_GET);

	echo "<br>";
	var_dump($_POST);*/
	if (isset($_POST['correo']) && isset($_POST['clave'])) {
		$mail=$_POST['correo'];
		$clave=$_POST['clave'];
	}else {
		die();
	}

	$listadoDeUsuarios=array();

	$archivo=fopen("usuario.txt","r");
	
	while (!feof($archivo)) {
		//echo "Renglon: " . fgets($archivo) . "<br>";
		$renglon=fgets($archivo);
		$datosDeUnUsuario=explode("=>", $renglon);
		if(isset($datosDeUnUsuario[1]))
		{
			$listadoDeUsuarios[]=$datosDeUnUsuario;
		}
		/*var_dump($datosDeUnUsuario);
		echo "<br>";*/
		/*if($datosDeUnUsuario[0]==$mail){
			if($datosDeUnUsuario[1]==$clave){
				echo "Bienvenido....";
			}
		}*/
	}
	fclose($archivo);

//var_dump($listadoDeUsuarios);
$ingreso="No Ingreso";
foreach ($listadoDeUsuarios as $datos) 
{
		if($datos[0]==$mail){
			if($datos[1]==$clave){
				echo "Bienvenido....";
				$ingreso="Ingreso";
				break;
			}
		}
}
if($ingreso=="No Ingreso"){
	echo "Datos erroneos ...";
}




?>


