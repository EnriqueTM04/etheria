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

// Determinar las opciones del menú según el rol
$es_organizador = ($rol_actual === 'Organizador');
$mostrar_registrar_eventos = $es_organizador;
$mostrar_reconocimientos = $es_organizador;
$mostrar_convocatorias = $es_organizador;

$mostrar_competidores = $es_organizador || $rol_actual === 'Instructor' || $rol_actual === 'Instructor con privilegios';
$mostrar_sesiones = $es_organizador || $rol_actual === 'Instructor' || $rol_actual === 'Instructor con privilegios';
$mostrar_descargar_reportes = $es_organizador || $rol_actual === 'Instructor' || $rol_actual === 'Instructor con privilegios';
$mostrar_generar_reportes = $es_organizador || $rol_actual === 'Instructor' || $rol_actual === 'Instructor con privilegios';
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
            <?php if ($mostrar_registrar_eventos): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card custom-card shadow-lg">
                        <div class="card-body text-center">
                            <i class="bi bi-calendar-plus-fill display-4 text-warning"></i>
                            <h5 class="card-title mt-3">Registrar Eventos</h5>
                            <p class="card-text">Crea y publica convocatorias para eventos emocionantes.</p>
                            <a href="/eventos" class="btn btn-warning">Acceder</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($mostrar_sesiones): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card custom-card shadow-lg">
                        <div class="card-body text-center">
                            <i class="bi bi-clipboard-check-fill display-4 text-primary"></i>
                            <h5 class="card-title mt-3">Administrar Sesiones</h5>
                            <p class="card-text">Consulta, actualiza y organiza todas las sesiones registradas.</p>
                            <a href="/sesiones" class="btn btn-warning">Acceder</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($mostrar_competidores): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card custom-card shadow-lg">
                        <div class="card-body text-center">
                            <i class="bi bi-trophy-fill display-4 text-danger"></i>
                            <h5 class="card-title mt-3">Competidores</h5>
                            <p class="card-text">Consulta la lista de competidores registrados para cada evento.</p>
                            <a href="/competidores" class="btn btn-warning">Acceder</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($mostrar_reconocimientos): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card custom-card shadow-lg">
                        <div class="card-body text-center">
                            <i class="bi bi-trophy-fill display-4 text-danger"></i>
                            <h5 class="card-title mt-3">Reconocimiento</h5>
                            <p class="card-text">Obtener y descargar reconocimientos otorgados</p>
                            <a href="/reconocimiento" class="btn btn-warning">Acceder</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($mostrar_generar_reportes): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card custom-card shadow-lg">
                        <div class="card-body text-center">
                            <i class="bi bi-file-earmark-text-fill display-4 text-danger"></i>
                            <h5 class="card-title mt-3">Generar reporte</h5>
                            <p class="card-text">Generar el reporte de un competidor</p>
                            <a href="/mostrar-reporte" class="btn btn-warning">Acceder</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($mostrar_descargar_reportes): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card custom-card shadow-lg">
                        <div class="card-body text-center">
                            <i class="bi bi-download display-4 text-danger"></i>
                            <h5 class="card-title mt-3">Descargar reportes</h5>
                            <p class="card-text">Descarga el reporte de un competidor</p>
                            <a href="/reportes" class="btn btn-warning">Acceder</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            
        </div>
    </div>
</div>
