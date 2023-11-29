<?php

function ConectarBd() {
    $cadena_conexion = 'mysql:dbname=clubdeportivo;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    return $bd;
}


