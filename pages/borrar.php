<?php

session_start();
include("funciones.php");
if (!isset($_SESSION["user"]) && !isset($_SESSION["password"])) {
    header("Location:../index.php");
} else {
    $tabla = $_GET["tabla"];
    $identificador = $_GET["identificador"];
    $campo = $_GET["campo"];
    if (ComprobarRol($_SESSION["user"]) == 1) {
        borrarCampo($tabla, $campo, $identificador);
        header("Location:admin.php");
    } elseif (ComprobarRol($_SESSION["user"]) == 2) {
        borrarCampo($tabla, $campo, $identificador);
        header("Location:users.php");
    }
}
?>