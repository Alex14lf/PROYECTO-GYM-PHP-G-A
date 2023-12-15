<?php
session_start();
include 'funciones.php';
if (!isset($_SESSION["user"]) && !isset($_SESSION["password"])) {
    header("Location:../index.php");
}
$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$rol = $_POST["rol"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];
actualizarUsuario($dni, $nombre, $apellidos, $telefono, $rol, $usuario, $password);
header("Location: admin.php");
?>
