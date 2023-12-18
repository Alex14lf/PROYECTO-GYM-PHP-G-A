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

function borrarCampo($tabla, $campo, $identificador) {
    try {
        $bd = ConectarBd();
        $consulta = $bd->prepare("DELETE FROM $tabla WHERE $campo=:identificador");
        $consulta->execute(array(":identificador" => $identificador));
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}

function crearUsuario($dni, $nombre, $apellidos, $telefono, $rol, $usuario, $password) {
    try {
        $bd = ConectarBd();
        $consulta = $bd->prepare("INSERT INTO usuarios (DNI, Nombre, Apellidos, Telefono, Rol, Usuario, Password)
                                  VALUES
                                  (:dni, :nombre, :apellidos, :telefono, :rol, :usuario, :password)");
        $consulta->execute(array(":dni" => $dni, ":nombre" => $nombre, ":apellidos" => $apellidos, ":telefono" => $telefono,
            ":rol" => $rol, ":usuario" => $usuario, ":password" => $password));
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}

function crearClase($id, $nombre, $hora, $lugar, $pista) {
    try {
        $bd = ConectarBd();
        $consulta = $bd->prepare("INSERT INTO clases (ID, Nombre, Hora, Lugar, Pista)
                                  VALUES
                                  (:id, :nombre, :hora, :lugar, :pista)");
        $consulta->execute(array(":id" => $id, ":nombre" => $nombre, ":hora" => $hora, ":lugar" => $lugar, ":pista" => $pista));
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}

function obtenerDni($user, $password) {
    try {
        $bd = ConectarBd();
        $consulta = $bd->prepare("SELECT DNI from usuarios WHERE usuario=:usuario AND password=:password");
        $consulta->execute(array(":usuario" => $user, ":password" => $password));
        foreach ($consulta as $row) {
            return $row["DNI"];
        }
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}

function actualizarUsuario($dni, $nombre, $apellidos, $telefono, $rol, $usuario, $password) {
    try {
        $bd = ConectarBd();
        $consulta = $bd->prepare("UPDATE usuarios SET nombre=:nombre,apellidos=:apellidos,telefono=:telefono,rol=:rol,usuario=:usuario,password=:password WHERE dni=:dni");
        $consulta->execute(array(":dni" => $dni, ":nombre" => $nombre, ":apellidos" => $apellidos, ":telefono" => $telefono,":rol" => $rol, ":usuario" => $usuario, ":password" => $password));
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}
function actualizarClase($id, $nombre, $hora, $lugar, $pista) {
    try {
        $bd = ConectarBd();
        $consulta = $bd->prepare("UPDATE clases SET nombre=:nombre,hora=:hora,lugar=:lugar,pista=:pista WHERE id=:id");
        $consulta->execute(array(":id" => $id, ":nombre" => $nombre, ":hora" => $hora, ":lugar" => $lugar,":pista" => $pista));
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}

function mostrarClasesDisponibles($dni){
    try {
        $bd = ConectarBd();
        $consulta = $bd->prepare("SELECT ID,Nombre
                                    FROM clases c
                                    WHERE c.ID NOT IN (
                                        SELECT uc.ID_CLASE
                                        FROM usuarios_clases uc
                                        WHERE uc.DNI = :dni
                                        );");
        $consulta->execute(array(":dni" => $dni));
        return $consulta;
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}

function apuntarseClase($clase,$dni){
    try {
        $bd = ConectarBd();
        $consulta = $bd->prepare("INSERT INTO usuarios_clases (DNI, ID_CLASE)
                                  VALUES
                                  (:DNI, :ID_CLASE);");
        $consulta->execute(array(":DNI" => $dni,":ID_CLASE" => $clase));
        return $consulta;
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
    
}