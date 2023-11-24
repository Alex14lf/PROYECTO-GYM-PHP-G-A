<?php

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
