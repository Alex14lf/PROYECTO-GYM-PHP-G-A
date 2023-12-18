<?php
include("funciones.php");
session_start();
if (!isset($_SESSION["user"]) && !isset($_SESSION["password"])) {
    header("Location:../index.php");
}
$dni = $_GET["dni"];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>crearClase</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <form action="apuntarseClase.php" method="POST">
                <div class="form-group">
                    <input type="hidden" name="dni" id="dni" class="form-control" value="<?php echo $dni ?>" />
                </div>

                <div class="form-group">
                    <label for="opcion">Selecciona una opción:</label>
                    <select class="form-control" id="opcion" name="opcion">
                        <?php
                        $consulta = mostrarClasesDisponibles($dni);
                        foreach ($consulta as $value) {
                            echo "<option value='" . $value["ID"] . "'>" . $value["Nombre"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">APUNTARSE</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

</html>
