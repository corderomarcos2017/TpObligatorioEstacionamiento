<?php
    function letras($numero) {
        /* 
         Fuente que  convierte un numero en letras.
         El rango de <EXPN> es de  0  a  999.999.999.999.999
         Devuelve un valor de tipo caracter.
         ===============================================================
        */

        $grupo=0;
        $grupos=["","001","002","003","004","005"];
        $unidad="" ; $decena=""  ; $centena=""; 
        $unilet="" ; $declet=""  ; $cenlet="";
        $conect="" ; $enletra=""; $numstr=""  ;
        $entero="" ; $n=0;

        $entero = trim($numero);
        $entero = str_repeat("0", 15 - strlen($entero)) . $entero;

        //echo $entero . "<br>";
        $numstr = $entero;
        
        //--- Separar la cifra en 5 $grupos ------
        echo "Valor :" . $numstr . "<br>";
        for($grupo=5;$grupo>=1;$grupo--){
            
            $unidad = $grupos[$grupo]%10;
            $decena = $grupos[$grupo]%100/10;
            $centena = $grupos[$grupo]%1000/100;
            
            //$grupos[$grupo]=$centena.$decena.$unidad;

            echo "Unidad: " . $unidad ;
            echo "decena: " . $decena ;
            echo "centena: " . $centena  ;
            echo "<br> Indice:" . $grupo . " " .$grupos[$grupo] . " " . $numstr . "<br>";
        }
        
        //--- Proceso de union ----------------
        $enletra = "";
        for($grupo=5;$grupo>=1;$grupo--) {
            $unidad = substr($grupos[$grupo], 1);
            $decena = substr($grupos[$grupo], 2, 1);
            $centena = substr($grupos[$grupo], 3, 1);
            //------ Determino las $unidades ---
            switch ($unidad) {
                Case 0: 
                    if($grupo == 1 && $entero < 1) {
                        $unilet ="CERO ";
                    } else {
                        $unilet ="";
                    }
                    break;
                Case 1: 
                    if($decena=="1") {
                       $unilet="ONCE ";
                    }elseif ($grupos[$grupo] == "001" && ($grupo == 2 || $grupo == 4)){
                       $unilet=" ";
                    }elseif ($grupo>2) {
                       $unilet="UN ";
                    }else {
                       $unilet="UNO ";
                    }
                    break;
                Case 2: 
                     if($decena == "1") {
                       $unilet = "DOCE "; 
                     }else {
                       $unilet = "DOS "; 
                     }  
                    break;
                Case 3: 
                     if($decena == "1") {
                       $unilet = "TRECE "; 
                     }else {
                       $unilet = "TRES "; 
                     }  
                    break;
                Case 4: 
                     if($decena == "1") {
                       $unilet = "CATORCE "; 
                     }else {
                       $unilet = "CUATRO "; 
                     }  
                    break;
                Case 5: 
                     if($decena == "1") {
                       $unilet = "QUINCE "; 
                     }else {
                       $unilet = "CINCO "; 
                     }  
                    break;
                Case 6: 
                     if($decena == "1") {
                       $unilet = "DIECISEIS "; 
                     }else {
                       $unilet = "SEIS "; 
                     }  
                    break;
                Case 7: 
                     if($decena == "1") {
                       $unilet = "DIECISIETE "; 
                     }else {
                       $unilet = "SIETE "; 
                     }  
                    break;
                Case 8: 
                    if($decena == "1") {
                       $unilet = "DIECIOCHO "; 
                     }else {
                       $unilet = "OCHO "; 
                     }  
                    break;
                Case 9: 
                     if($decena == "1") {
                       $unilet = "DIECINUEVE "; 
                     }else {
                       $unilet = "NUEVE "; 
                     }  
                    break;
            }
            //------ Determino las $decenas ---
            switch($decena){
                Case 0: 
                    $declet = "";
                    break;
                Case 1: 
                    if($unidad == "0") {
                       $declet = "DIEZ "; 
                    }else {
                       $declet = ""; 
                    }  
                    break;
                Case 2: 
                    if($unidad == "0") {
                       $declet = "VEINTE "; 
                    }else {
                       $declet = "VEINTI"; 
                    }  
                    break;
                Case 3: 
                    if($unidad == "0") {
                       $declet = "TREINTA "; 
                    }else {
                       $declet = "TREINTA Y "; 
                    }  
                    break;
                Case 4: 
                    if($unidad == "0") {
                       $declet = "CUARENTA "; 
                    }else {
                       $declet = "CUARENTA Y "; 
                    }  
                    break;
                Case 5: 
                    if($unidad == "0") {
                       $declet = "CINCUENTA "; 
                    }else {
                       $declet = "CINCUENTA Y "; 
                    }  
                    break;
                Case 6: 
                    if($unidad == "0") {
                       $declet = "SESENTA "; 
                    }else {
                       $declet = "SESENTA Y "; 
                    }  
                    break;
                Case 7: 
                    if($unidad == "0") {
                       $declet = "SETENTA "; 
                    }else {
                       $declet = "SETENTA Y "; 
                    }  
                    break;
                Case 8: 
                    if($unidad == "0") {
                       $declet = "OCHENTA "; 
                    }else {
                       $declet = "OCHENTA Y "; 
                    }  
                    break;
                Case 9: 
                    if($unidad == "0") {
                       $declet = "NOVENTA "; 
                    }else {
                       $declet = "NOVENTA Y "; 
                    }  
                    break;
            }
            //------ Determino la $centenas ---
            switch($centena){
               Case 0: 
                    $cenlet = "";
                    break;
               Case 1: $cenlet = IIf($decena & $unidad = "00", "CIEN ", "CIENTO ");
                    if($decena & $unidad == "00") {
                      $cenlet = "CIEN "; 
                    }else {
                      $cenlet = "CIENTO "; 
                    }  
                    break;
               Case 2: 
                    $cenlet = "DOSCIENTOS ";
                    break;
               Case 3: 
                    $cenlet = "TRESCIENTOS ";
                    break;
               Case 4: 
                    $cenlet = "CUATROCIENTOS ";
                    break;
               Case 5: 
                    $cenlet = "QUINIENTOS ";
                    break;
               Case 6: 
                    $cenlet = "SEISCIENTOS ";
                    break;
               Case 7: 
                    $cenlet = "SETECIENTOS ";
                    break;
               Case 8: 
                    $cenlet = "OCHOCIENTOS ";
                    break;
               Case 9: 
                    $cenlet = "NOVECIENTOS ";
                    break;
            }
            //------ Determino los $conectores Ej: mil o Millones ---
            switch($grupo){
                Case 1: 
                    $conect = "";
                Case 2: 
                    if($grupos[2] > "000") {
                      $conect = "MIL "; 
                    }else {
                      $conect = ""; 
                    }  
                    break;
                Case 3: 
                    if($grupos[3] > "000" ||$grupos[4] > "000"){
                        if($grupos[3] == "001"){
                            $conect = "MILLON ";        
                        } else {
                            $conect = "MILLONES ";        
                        }
                    } else {
                        $conect = "";                                
                    }
                Case 4: 
                    if($grupos[4] > "000") {
                      $conect = "MIL "; 
                    }else {
                      $conect = ""; 
                    }  
                    break;
                Case 5: 
                    if($grupos[5] > "000") {
                        if($grupos[3] == "001"){
                            $conect = "BILLON ";        
                        } else {
                            $conect = "BILLONES ";        
                        }
                    }else {
                      $conect = ""; 
                    }  
                    break;
            }
            //------- Union de todos los $grupo para forma la fraze -------
            $enletra = $enletra . $cenlet . $declet . $unilet . $conect;
        }
        return $enletra . " con " . $vDecimal . " centavos";
    }
    $a=125;
    echo "El numero es: " . $a . " " . letras($a);
?>
