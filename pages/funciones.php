<?php

function ConectarBd() {
    $cadena_conexion = 'mysql:dbname=clubdeportivo;host=127.0.0.1';
    $usuario = 'root';
    $clave = '';
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    return $bd;
}

function comprobarUsuario($user, $password) {
    try {
        $bd = ConectarBd();
        $consulta = $bd->prepare("SELECT * from usuarios WHERE usuario=:usuario AND password=:password");
        $consulta->execute(array(":usuario" => $user, ":password" => $password));
        foreach ($consulta as $fila) { //ENTRA SOLO SI EXISTE EL USUARIO Y CONTRASEÑA
            if ($fila["Usuario"] == $user && $fila["Password"] == $password) {
                return true;
            } else {
                return false;
            }
        }
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}

function ComprobarRol($user) {
    try {
        $bd = ConectarBd();
        $consulta = $bd->prepare("SELECT Rol from usuarios WHERE usuario=:usuario");
        $consulta->execute(array(":usuario" => $user));
        foreach ($consulta as $row) {
            return $row["Rol"];  
        }
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}

function borrarCampo($tabla,$campo,$identificador){
    try {
        $bd = ConectarBd();
        $consulta = $bd->prepare("DELETE FROM $tabla WHERE $campo=:identificador");
        $consulta->execute(array(":identificador" => $identificador));
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}
