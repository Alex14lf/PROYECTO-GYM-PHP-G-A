<?php
session_start();
include 'funciones.php';
if (!isset($_SESSION["user"]) && !isset($_SESSION["password"])) {
    header("Location:../index.php");
}
$dni = $_POST["dni"];
$clase=$_POST["opcion"];
apuntarseClase($clase, $dni);
header("Location: users.php");
?>