<?php


/*var_dump($_GET);

echo "<br>"; 
var_dump($_POST); */

$mail=$_POST['correo'];
$clave=$_POST['clave'];
$copiaclave=$_POST['copiaclave'];

/*echo "Su correro es :" . $mail . "<br>";
echo "Su clave es ". $clave . "<br>";
echo "Su copia clave es ". $copiaclave;
*/

if($clave==$copiaclave)
{
	date_default_timezone_set("America/Argentina/Buenos_Aires");
	$ahora=date("Y-m-d H:i:s");
	$renglon = "\n".$mail."=>".$clave."=>" . $ahora;
	$archivo=fopen("usuario.txt","a");
	fwrite($archivo, $renglon);
	
	fclose($archivo);


} else {
	echo "ERROR en clave";
}

?>


