<?php

function ConectarBd() {
    $cadena_conexion = 'mysql:dbname=clubdeportivo;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    return $bd;
}

function comprobar_usuario($nombre, $clave, $usuarios) {

    foreach ($usuarios as $usuario) {
        if ($usuario['nombre'] === $nombre) {
            if ($usuario['clave'] === $clave) {
                $usu['nombre'] = $nombre;
                return $usu;
            } else {
                return FALSE;
            }
        }
    }
    //Devuelve false tras recorrer todo el array si no existe el usuario o la contraseña no coincide
    return FALSE;
}
