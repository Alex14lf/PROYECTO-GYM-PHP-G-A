<?php
include 'funciones.php';
$dni = $_POST["dni"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$telefono = $_POST["telefono"];
$rol = $_POST["rol"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];
crearUsuario($dni, $nombre, $apellidos, $telefono, $rol, $usuario, $password);
header("Location: admin.php");
?>