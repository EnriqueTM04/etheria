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
            <!-- Tarjeta 1 - Registrar Eventos -->
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

            <!-- Tarjeta 2 - Administrar Sesiones -->
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

            <!-- Tarjeta 3 - Asignar Instructores -->
            <div class="col-md-6 col-lg-4">
                <div class="card custom-card shadow-lg">
                    <div class="card-body text-center">
                        <i class="bi bi-person-check-fill display-4 text-success"></i>
                        <h5 class="card-title mt-3">Asignar Instructores</h5>
                        <p class="card-text">Asigna instructores a eventos específicos para una mejor organización.</p>
                        <a href="/asignar-instructores" class="btn btn-warning">Acceder</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 4 - Competidores -->
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
        </div>
    </div>
</div>