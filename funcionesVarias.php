<?php
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
    $a=12349;
    echo "el numero es: $a <br>";
    echo "en letras : " . letras($a);
?>
