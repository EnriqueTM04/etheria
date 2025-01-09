<?php
// Iniciar la sesión si aún no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_nombre']) || empty($_SESSION['usuario_nombre'])) {
    header("Location: /login");
    exit();
}

// Obtener datos del usuario desde la sesión
$nombre_usuario = $_SESSION['usuario_nombre'];
$rol_actual = isset($_SESSION['usuario_rol']) ? $_SESSION['usuario_rol'] : 'Sin rol';
?>
<div class="container mt-5">
    <!-- Encabezado -->
    <div class="text-center mb-4">
        <h1 class="fw-bold"><?php echo htmlspecialchars($nombre_usuario); ?></h1>
        <p class="text-muted mb-3"><?php echo htmlspecialchars($rol_actual); ?></p>
        <a href="/logout" class="btn btn-danger">Cerrar sesión</a>
    </div>

    <!-- Contenido Principal -->
    <div class="menu mt-5">
        <div class="row g-4">
            <!-- Tarjeta 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Registro de Instructores</h5>
                        <p class="card-text">Registra instructores y responsables del club.</p>
                        <a href="registro_instructores.html" class="btn btn-warning">Acceder</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Registrar Eventos</h5>
                        <p class="card-text">Crea eventos y publica convocatorias.</p>
                        <a href="registro_eventos.html" class="btn btn-warning">Acceder</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Consulta de Competidores</h5>
                        <p class="card-text">Consulta la lista de competidores registrados.</p>
                        <a href="consulta_competidores.html" class="btn btn-warning">Acceder</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Información Estadística</h5>
                        <p class="card-text">Accede a estadísticas de desempeño.</p>
                        <a href="informacion_estadistica.html" class="btn btn-warning">Acceder</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Reporte de Lugares</h5>
                        <p class="card-text">Consulta los mejores lugares históricos.</p>
                        <a href="../reporteLugares/reporte_lugares.html" class="btn btn-warning">Acceder</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Descargar Reconocimientos</h5>
                        <p class="card-text">Obtén y descarga reconocimientos del club.</p>
                        <a href="../reconocimiento/constancia_reconocimiento.html" class="btn btn-warning">Acceder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>