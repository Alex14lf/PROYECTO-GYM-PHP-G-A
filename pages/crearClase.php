<?php
include("funciones.php");
session_start();
if (!isset($_SESSION["user"]) && !isset($_SESSION["password"])) {
    header("Location:../index.php");
}
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
            <form>
                <div class="mb-3 col-lg-6">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id">
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre">
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="text" class="form-control" id="hora">
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="lugar" class="form-label">Lugar</label>
                    <input type="text" class="form-control" id="lugar">
                </div>
                <div class="mb-3 col-lg-6">
                    <label for="pista" class="form-label">Pista</label>
                    <input type="number" class="form-control" id="pista">
                </div>
                <button type="submit" class="btn btn-primary">REGISTRAR</button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

</html>