<?php
include("funciones.php");
$tabla=$_GET["tabla"];
$identificador=$_GET["identificador"];
borrarCampo($tabla, $identificador);
header("Location:admin.php");
?>