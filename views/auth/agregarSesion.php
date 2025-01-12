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
$nombre_usuario = isset($_SESSION['usuario_nombre']) ? $_SESSION['usuario_nombre'] : 'Usuario desconocido';
$rol_actual = isset($_SESSION['usuario_rol']) ? $_SESSION['usuario_rol'] : 'Sin rol';

// Asegurarse de que las variables están inicializadas para evitar errores
$eventos = isset($eventos) ? $eventos : [];
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Agregar Sesión</h1>
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

        <!-- Checkbox para "Registrar sesión fuera del calendario" -->
        <?php if ($rol_actual === 'Instructor con privilegios' || $rol_actual === 'Organizador'): ?>
            <div class="form-group mt-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="fueraCalendario" name="fueraCalendario" onchange="toggleMotivo()">
                    <label class="form-check-label" for="fueraCalendario">
                        Registrar sesión fuera del calendario
                    </label>
                </div>
            </div>
            <!-- Campo para motivo -->
            <div class="form-group mt-3" id="motivoGroup" style="display: none;">
                <label for="motivo">Motivo</label>
                <textarea class="form-control" id="motivo" name="motivo" rows="5" placeholder="Introduce el motivo"></textarea>
            </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary mt-3">Agregar Sesión</button>
    </form>
</div>

<script>
    function toggleMotivo() {
        const motivoGroup = document.getElementById('motivoGroup');
        const checkbox = document.getElementById('fueraCalendario');
        if (checkbox.checked) {
            motivoGroup.style.display = 'block';
        } else {
            motivoGroup.style.display = 'none';
        }
    }
</script>
