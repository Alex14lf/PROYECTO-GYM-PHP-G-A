<?php
session_start();
include("funciones.php");
if (!isset($_SESSION["user"]) && !isset($_SESSION["password"])) {
    header("Location:../index.php");
} else {
    if(ComprobarRol($_SESSION["user"])==1){
    $tabla = $_GET["tabla"];
    $identificador = $_GET["identificador"];
    $campo = $_GET["campo"];
    borrarCampo($tabla, $campo, $identificador);
    header("Location:admin.php");
    }
    elseif(ComprobarRol($_SESSION["user"])==2){
        header("Location:users.php");
    }
    
}
?>