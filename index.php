<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="contenido">
            <!-- Section: Design Block -->
            <section class="">
                <!-- Jumbotron -->
                <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
                    <div class="container">
                        <div class="row gx-lg-5 align-items-center">
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <h1 class="my-5 display-3 fw-bold ls-tight">
                                    Desata tu Poder en <br />
                                    <span class="text-primary">Demonios Gym</span>
                                </h1>
                                <p style="color: hsl(217, 10%, 50.8%)">
                                    ¡Bienvenido/a a Demonios Gym, donde tus metas fitness toman vida! 
                                    En este santuario del entrenamiento, te invitamos a liberar tu verdadero potencial 
                                    y desatar la fuerza que llevas dentro. Nuestro equipo de entrenadores expertos está 
                                    aquí para guiarte en cada paso de tu viaje, ya sea que estés buscando esculpir tu cuerpo, 
                                    aumentar tu resistencia o simplemente mantenerte en forma. En Demonios Gym, la determinación 
                                    y el espíritu competitivo se combinan para crear un ambiente único donde cada entrenamiento se 
                                    convierte en una victoria personal. ¡Prepárate para enfrentar tus desafíos con valentía y alcanzar 
                                    nuevas alturas en Demonios Gym!
                                </p>
                            </div>

                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <div class="card">
                                    <div class="card-body py-5 px-md-5">
                                        <form action="pages/validarLogin.php" method="POST">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="user">User</label>
                                                <input type="text" id="user" class="form-control" />

                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="password">Password</label>
                                                <input type="password" id="password" class="form-control" />
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block mb-4">Sign Up</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Jumbotron -->
            </section>
            <!-- Section: Design Block -->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>

</html>
