<?php

if (isset($_POST["user"]) && !empty($_POST["user"])) {
    $user = $_POST["user"];
    $usuarioExistente = true;
}
if (isset($_POST["password"]) && !empty($_POST["user"])) {
    $password = $_POST["password"];
    $passwordExistente = true;
}

if (!$passwordExistente || !$usuarioExistente) {
    header("location:../index.php");
}


try {
    //Se crea la conexión con la base de datos
    include("funciones.php");
    $bd = ConectarBd();
    //Se construye la consulta y se guarda en una variable
    $consulta = $bd->prepare("SELECT * from usuarios WHERE usuario=:usuario AND password=:password");
    $consulta->execute(array(":usuario" => $user, ":password" => $password));
    
    //Realizar busqueda
    if($consulta){
        foreach ($consulta as $fila) { //ENTRA SOLO SI EXISTE EL USUARIO Y CONTRASEÑA
            if ($fila["Usuario"] == $user && $fila["Password"] == $password) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['password'] = $password;
                if ($fila["Rol"] == 1) {
                    header("location:admin.php");
                } else {
                    if ($fila["Rol"] == 2) {
                        header("location:users.php");
                    }
                }
            }
        }
    }else{
        header("Location:../index.php?login=incorrecto");
    }
    //Se cierra la conexión
    $bd = null;
} catch (Exception $e) {
    echo "Error con la base de datos: " . $e->getMessage();
}
?>
