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
            <!-- Tarjeta 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Registrar Eventos</h5>
                        <p class="card-text">Crea eventos y publica convocatorias.</p>
                        <a href="/eventos" class="btn btn-warning">Acceder</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Administrar sesiones</h5>
                        <p class="card-text">Consulta la lista de sesiones registradas.</p>
                        <a href="/sesiones" class="btn btn-warning">Acceder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>