<?php
include 'funciones.php';
session_start();
if (!isset($_SESSION["user"]) && !isset($_SESSION["password"])) {
    header("Location:../index.php");
}
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
        <div class="container mt-5">
            <div class="row"> 
                <div class="col-md-12">
                    <?php
                    try {
                        $dni=obtenerDni($_SESSION["user"], $_SESSION["password"]);
                        $bd = ConectarBd();
                        $consulta = $bd->prepare("SELECT clases.*
                                                    FROM usuarios
                                                    JOIN usuarios_clases ON usuarios.dni = usuarios_clases.dni
                                                    JOIN clases ON usuarios_clases.id_clase = clases.id
                                                    WHERE usuarios.dni = ".$dni.";");
                        $consulta->execute();
                        ?>
                        <h1 style="text-align:center">CLASES DE <?php echo strtoupper($_SESSION["user"]) ?> </h1>
                        <table class="table" >
                            <thead class="table-primary" >
                                <tr>
                                    <th>Nombre</th>
                                    <th>Hora</th>
                                    <th>Lugar</th>
                                    <th>Pista</th>
                                    <th>Desapuntarse</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($consulta as $dato) {
                                    echo "<tr>";
                                    echo "<td>" . $dato["Nombre"] . "</td>";
                                    echo "<td>" . $dato["Hora"] . "</td>";
                                    echo "<td>" . $dato["Lugar"] . "</td>";
                                    echo "<td>" . $dato["Pista"] . "</td>";
                                    echo "<td><a href='borrar.php?tabla=usuarios&campo=DNI&identificador=" . $user["DNI"] . "'" . "><img src='../assets/images/eliminar.png'></a></td>";

                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary"><a href="crearUsuarioForm.php"  style="text-decoration: none; color: inherit; display: block; width: 100%; height: 100%;">APUNTARSE A CLASE</a></button>
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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>