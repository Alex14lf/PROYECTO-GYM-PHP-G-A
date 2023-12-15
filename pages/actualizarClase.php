<?php
session_start();
include 'funciones.php';
if (!isset($_SESSION["user"]) && !isset($_SESSION["password"])) {
    header("Location:../index.php");
}
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$hora = $_POST["hora"];
$lugar = $_POST["lugar"];
$pista = $_POST["pista"];
actualizarClase($id, $nombre, $hora, $lugar, $pista);
header("Location: admin.php");
?>


