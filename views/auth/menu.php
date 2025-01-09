<?php
session_start(); // Asegúrate de que la sesión está iniciada

// Verifica si el usuario está autenticado
$nombre_usuario = $_SESSION['usuario_nombre'] ?? 'Usuario';
$rol_actual = $_SESSION['usuario_rol'] ?? 'Invitado'; // Asegúrate de que el rol esté en la sesión
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">
        Bienvenido al Club de Leones, <?php echo htmlspecialchars($nombre_usuario); ?>
    </h1>
    <h4 class="text-center mb-4">
        Tu rol actual: <strong><?php echo htmlspecialchars($rol_actual); ?></strong>
    </h4>

    <!-- Main Content -->
    <div class="row mt-4">
        <!-- Tarjeta 1 -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Registro de Instructores</h5>
                    <p class="card-text">Registra instructores y responsables del club.</p>
                    <a href="registro_instructores.html" class="btn btn-warning">Acceder</a>
                </div>
            </div>
        </div>
        <!-- Tarjeta 2 -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Registrar Eventos</h5>
                    <p class="card-text">Crea eventos y publica convocatorias.</p>
                    <a href="registro_eventos.html" class="btn btn-warning">Acceder</a>
                </div>
            </div>
        </div>
        <!-- Tarjeta 3 -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Consulta de Competidores</h5>
                    <p class="card-text">Consulta la lista de competidores registrados.</p>
                    <a href="consulta_competidores.html" class="btn btn-warning">Acceder</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Tarjeta 4 -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Información Estadística</h5>
                    <p class="card-text">Accede a estadísticas de desempeño.</p>
                    <a href="informacion_estadistica.html" class="btn btn-warning">Acceder</a>
                </div>
            </div>
        </div>
        <!-- Tarjeta 5 -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Reporte de Lugares</h5>
                    <p class="card-text">Consulta los mejores lugares históricos.</p>
                    <a href="../reporteLugares/reporte_lugares.html" class="btn btn-warning">Acceder</a>
                </div>
            </div>
        </div>
        <!-- Tarjeta 6 -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Descargar Reconocimientos</h5>
                    <p class="card-text">Obtén y descarga reconocimientos del club.</p>
                    <a href="../reconocimiento/constancia_reconocimiento.html" class="btn btn-warning">Acceder</a>
                </div>
            </div>
        </div>
    </div>
</div>
