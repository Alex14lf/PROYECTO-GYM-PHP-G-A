<?php
session_start();

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
    if (comprobarUsuario($user, $password)) {
        $_SESSION["user"] = $user;
        $_SESSION["password"] = $password;
        if(ComprobarRol($user)==1){
            header("Location:admin.php");
        }else if(ComprobarRol($user)==2){
            header("Location:users.php");
        };
    } else {
        header("Location:../index.php?login=incorrecto");
    }
    //Se cierra la conexión
    $bd = null;
} catch (Exception $e) {
    echo "Error con la base de datos: " . $e->getMessage();
}


?>
