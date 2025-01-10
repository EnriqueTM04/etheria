<?php
// Inicia la sesión si no se ha iniciado ya
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_nombre']) || empty($_SESSION['usuario_nombre'])) {
    header("Location: /login");
    exit();
}

// Obtener datos del usuario desde la sesión
$nombre_usuario = $_SESSION['usuario_nombre'];
$rol_actual = isset($_SESSION['usuario_rol']) ? $_SESSION['usuario_rol'] : 'Sin rol';

// Otras configuraciones globales pueden ir aquí
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Agregar Sesión</h1>
    <h1>Rol: <?php echo htmlspecialchars($rol_actual); ?> </h1>
    <?php if (!empty($alertas)): ?>
        <div class="alert alert-danger">
            <?php foreach ($alertas as $alerta): ?>
                <p><?php echo htmlspecialchars($alerta); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form action="/sesion/agregar" method="POST">
        <div class="form-group">
            <label for="fechaHora">Fecha y Hora</label>
            <input type="datetime-local" class="form-control" id="fechaHora" name="fechaHora" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="metrosRecorridos">Metros Recorridos</label>
            <input type="number" class="form-control" id="metrosRecorridos" name="metrosRecorridos" required>
        </div>
        <div class="form-group">
            <label for="idEvento">Evento</label>
            <select class="form-control" id="idEvento" name="idEvento" required>
                <?php foreach($eventos as $evento): ?>
                    <option value="<?php echo htmlspecialchars($evento->id); ?>"><?php echo htmlspecialchars($evento->nombre); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Agregar Sesión</button>
    </form>
</div>