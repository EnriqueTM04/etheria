<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/icono.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../public/build/css/style.css">

    <title>Club de leones - Acceso</title>
</head>

<body>
    <div class="contenedorPrincipal">
        <div class="row g-0">
            <div class="col-sm-12 col-lg-6 col-md-6" id="columna1">
                <div id="contenedorImagen">
                    <img src="../../public/build/img/imagenPrincipal.avif" alt="Imagen principal">
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-md-6" id="columna2">
                
                <form class="form-group" action="/login" method="POST">
                    <h2>Inicio de sesión</h2>
                    <!-- Nombre de usuario -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Ingrese usuario" required>
                    </div>
                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                    </div>
                    <!-- Recordar sesión -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                        <label class="form-check-label" for="exampleCheck1">Recordar el inicio de sesión</label>
                    </div>
                    <!-- Botón de inicio -->
                    <button type="submit" class="btn btn-primary">Acceder</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>
