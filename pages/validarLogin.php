<?php

if (!$_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: ../index.php");
} else {
    if (isset($_POST["user"]) && !empty($_POST["user"])) {
        $user = $_POST["user"];
    }
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }
}

try {
    //Se crea la conexión con la base de datos
    include("funciones.php");
    $bd = ConectarBd();
    //Se construye la consulta y se guarda en una variable
    $consulta = $bd->prepare("SELECT * from usuarios WHERE usuario=:usuario AND password=:password");
    $consulta->execute(array(":usuario" => $user, ":password" => $password));
    //Se cierra la conexión
    $bd = null;
} catch (Exception $e) {
    echo "Error con la base de datos: " . $e->getMessage();
}

foreach ($consulta as $fila) {
    if ($fila["Usuario"] == $user && $fila["Password"] == $password) {
        if ($fila["Rol"] == 1) {
            header("location:admin.php");
        } else {
            if ($fila["Rol"] == 2) {
                header("location:users.php");
            }
        }
    }
    
//    echo $user["DNI"];
//    echo $user["Nombre"];
//    echo $user["Apellidos"];
}
//if ($fila["Usuario"] != $user || $fila["Password"] != $password) {
//        header("location:../index.php?login=incorrecto");
//    }
?>
