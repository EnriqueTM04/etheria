<?php
session_start(); // Inicia la sesión

// Verifica si el usuario ya está logueado
if (isset($_SESSION['usuario_id'])) {
    // Redirige al menú principal si la sesión está activa.
    header('Location: /menu');
    exit;
}
?>

<div class="contenedorPrincipal">
    <div class="row g-0">
        <!-- Columna de imagen -->
        <div class="col-sm-12 col-lg-6 col-md-6" id="columna1">
            <div id="contenedorImagen">
                <img src="build/img/imagenPrincipal.avif" alt="Imagen principal">
            </div>
        </div>

        <!-- Columna del formulario -->
        <div class="col-sm-12 col-lg-6 col-md-6" id="columna2">
            <form class="form-group" action="/login" method="POST">
                <h2>Inicio de sesión</h2>
                <!-- Correo -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="correo"
                        aria-describedby="emailHelp" placeholder="Ingrese correo" required>
                </div>
                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>
                </div>
                <!-- Recordar sesión -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                    <label class="form-check-label" for="exampleCheck1">Recordar el inicio de sesión</label>
                </div>
                <!-- Botón de inicio -->
                <button type="submit" class="btn btn-primary">Acceder</button>
                <!-- Enlace al registro -->
                <p class="mt-3">¿No tienes cuenta? <a href="/registro" class="text-primary">Regístrate aquí</a></p>
            </form>
        </div>
    </div>
</div>
