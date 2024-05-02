<?php 
include_once("config.php");

function conectar(){
    $link = new mysqli(HOST,USUARIO,PASSWORD,NOMBREBD);
    if($link -> connect_errno){
        die("Error en la conexion a la Base de datos");

    }else{
        // mysqli_query($link,"SET NAME 'utf8'");
        mysqli_query($link,"SET NAMES 'utf8'");
        mysqli_set_charset($link,"utf8");
        date_default_timezone_set("America/lima");
        return $link;
    }
}


?>