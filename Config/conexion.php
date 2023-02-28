<?php

    $host= "localhost";
    $user= "root";
    $pass= "";
    $db= "form";

    $conexion = new mysqli($host,$user,$pass,$db);

    if(!$conexion){
        echo "Conexion Fallida";
    }


?>