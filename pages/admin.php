<?php
session_start();
include("funciones.php");
if (!isset($_SESSION["user"]) && !isset($_SESSION["password"])) {
   header("Location:../index.php");
}else{
    if(ComprobarRol($_SESSION["user"])==2){
        header("Location:users.php");
    }
}

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Demonios's Gym</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style__all.css">
        <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon">
    </head>
    <body>
        <div class="admin__container">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="us" data-bs-toggle="tab" data-bs-target="#usuarios" type="button" role="tab" aria-controls="usuarios" aria-selected="true">USUARIOS</button>
                    <button class="nav-link" id="cl" data-bs-toggle="tab" data-bs-target="#clases" type="button" role="tab" aria-controls="clases" aria-selected="false">CLASES</button>
                    <h1 style="text-align:end; width: 60%">Bienvenido al usuario <?php echo $_SESSION["user"] ?> </h1>
                    <button type="button" class="btn btn-warning"><a href="cerrarSesion.php" class="text-white text-decoration-none">Cerrar Sesión</a></button>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="usuarios" role="tabpanel" aria-labelledby="usuarios" tabindex="0">
                    <div class="container mt-5">
                        <div class="row"> 
                            <div class="col-md-12">
                                <?php
                                try {
                                    //Se crea la conexión con la base de datos
//                                    include("funciones.php");
                                    $bd = ConectarBd();
                                    //Se construye la consulta y se guarda en una variable
                                    $consulta = $bd->prepare("SELECT * from usuarios");
                                    $consulta->execute();
                                    ?>
                                    <h1 style="text-align:center">USUARIOS DEL GYM</h1>
                                    <table class="table" >
                                        <thead class="table-primary" >
                                            <tr>
                                                <th>Dni</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Telefono</th>
                                                <th>Rol</th>
                                                <th>Usuario</th>
                                                <th>Contraseña</th>
                                                <th>Borrar</th>
                                                <th>Actualizar</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach ($consulta as $user) {
                                                echo "<tr>";
                                                echo "<td>" . $user["DNI"] . "</td>";
                                                echo "<td>" . $user["Nombre"] . "</td>";
                                                echo "<td>" . $user["Apellidos"] . "</td>";
                                                echo "<td>" . $user["Telefono"] . "</td>";
                                                echo "<td>" . $user["Rol"] . "</td>";
                                                echo "<td>" . $user["Usuario"] . "</td>";
                                                echo "<td>" . $user["Password"] . "</td>";
                                                echo "<td><a href='borrar.php?tabla=usuarios&campo=DNI&identificador=" . $user["DNI"] . "'" . "><img src='../assets/images/eliminar.png'></a></td>";
                                                echo "<td><a href='actualizarUsuarioForm.php?identificador=" . $user["DNI"] . "'" . "><img src='../assets/images/actualizar.png'></a></td>";

                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-primary"><a href="crearUsuarioForm.php"  style="text-decoration: none; color: inherit; display: block; width: 100%; height: 100%;">CREAR USUARIO</a></button>
                                </div>
                                <?php
                                //Se cierra la conexión
                                $bd = null;
                            } catch (Exception $e) {
                                echo "Error con la base de datos: " . $e->getMessage();
                            }
                            ?>
                        </div>  
                    </div>
                </div>
                <div class="tab-pane fade show" id="clases" role="tabpanel" aria-labelledby="clases" tabindex="0">
                    <div class="container mt-5">
                        <div class="row"> 
                            <div class="col-md-12">
                                <?php
                                try {
                                    //Se crea la conexión con la base de datos
//                                    include("funciones.php");
                                    $bd2 = ConectarBd();
                                    //Se construye la consulta y se guarda en una variable
                                    $consulta2 = $bd2->prepare("SELECT * from clases");
                                    $consulta2->execute();
//                                    ?>
                                    <h1 style="text-align:center">CLASES DEL GYM</h1>
                                    <table class="table" >
                                        <thead class="table-primary" >
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Hora</th>
                                                <th>Lugar</th>
                                                <th>Pista</th>
                                                <th>Borrar</th>
                                                <th>Actualizar</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach ($consulta2 as $clase) {
                                                echo "<tr>";
                                                echo "<td>" . $clase["ID"] . "</td>";
                                                echo "<td>" . $clase["Nombre"] . "</td>";
                                                echo "<td>" . $clase["Hora"] . "</td>";
                                                echo "<td>" . $clase["Lugar"] . "</td>";
                                                echo "<td>" . $clase["Pista"] . "</td>";
                                                echo "<td><a href='borrar.php?tabla=clases&campo=ID&identificador=" . $clase["ID"] . "'" . "><img src='../assets/images/eliminar.png'></a></td>";
                                                echo "<td><a href='formulario_actualizar.php?identificador=" . $clase["ID"] . "'" . "><img src='../assets/images/actualizar.png'></a></td>";

                                                echo "</tr>";
                                           }
                                           ?>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-primary"><a href="crearClaseForm.php"  style="text-decoration: none; color: inherit; display: block; width: 100%; height: 100%;">CREAR CLASE</a></button>
                                </div>
                                <?php
                               //Se cierra la conexión
                                $bd2 = null;
                            } catch (Exception $e) {
                                echo "Error con la base de datos: " . $e->getMessage();
                            }
                            ?>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>