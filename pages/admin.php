<?php
//session_start();
//Si la sesion no tiene un usuario devuelve a la pagina de login
//if (!isset($_SESSION["usuario"])) {
//    header("Location: ../index.php");
//} else {
//    $user = $_SESSION["usuario"];
//}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Demonios's Gym</title>
        <link rel="stylesheet" href="../css/normalize.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style__all.css">
        <link rel="shortcut icon" href="../assets/images/logo.png" type="image/x-icon">
    </head>
    <body>
        <div class="admin__container">
            <?php
            try {
                //Se crea la conexión con la base de datos
                include("funciones.php");
                $bd = ConectarBd();
                //Se construye la consulta y se guarda en una variable
                $consulta = $bd->prepare("SELECT * from usuarios WHERE rol=:rol");
                $consulta->execute(array(":rol" => 1));
                //Se cierra la conexión
                $bd = null;
            } catch (Exception $e) {
                echo "Error con la base de datos: " . $e->getMessage();
            }
            ?>
            <div class="container mt-5">
                <div class="row"> 
                    <div class="col-md-6">
                        <h1>USUARIOS DEL GYM</h1>
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
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h1>CLASES DEL GYM</h1>
                        <table class="table" >
                            <thead class="table-primary" >
                                <tr>
                                    <th>Dni</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Telefono</th>
                                    <th>Rol</th>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
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
                                        echo "<td>" . $user["Contraseña"] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>