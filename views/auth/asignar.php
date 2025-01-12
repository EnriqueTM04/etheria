<?php
// Inicia la sesión si no se ha iniciado ya
if (session_status() == PHP_SESSION_NONE) {
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

// Obtener todos los eventos y asignarles sus instructores
$eventos = obtenerEventos(); // Debes obtener los eventos de tu base de datos
$instructores = obtenerInstructores(); // Obtener los instructores de la base de datos
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Asignar Instructores a Eventos</h1>
    <p class="text-center">Rol del usuario: <?php echo htmlspecialchars($rol_actual); ?></p>

    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Evento</th>
                    <th>Instructor Asignado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($eventos as $evento): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($evento->nombre); ?></td>
                        <td>
                            <?php 
                                // Verifica si hay un instructor asignado a este evento
                                $instructorAsignado = obtenerInstructorPorEvento($evento->id); // Esta función debe devolver el instructor asignado si lo hay
                                echo $instructorAsignado ? htmlspecialchars($instructorAsignado->nombre) : 'Sin instructor';
                            ?>
                        </td>
                        <td>
                            <?php if (!$instructorAsignado): ?>
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#asignarInstructorModal" data-id-evento="<?php echo $evento->id; ?>">Asignar Instructor</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal para asignar instructor -->
<div class="modal fade" id="asignarInstructorModal" tabindex="-1" aria-labelledby="asignarInstructorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="asignarInstructorModalLabel">Seleccionar Instructor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Selecciona un instructor para este evento:</p>
        <select class="form-select" id="instructorSelect">
            <option value="">Seleccionar Instructor</option>
            <?php foreach ($instructores as $instructor): ?>
                <option value="<?php echo $instructor->id; ?>"><?php echo htmlspecialchars($instructor->nombre); ?></option>
            <?php endforeach; ?>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="asignarInstructorBtn">Asignar Instructor</button>
      </div>
    </div>
  </div>
</div>

<script>
    // Al abrir el modal, asociamos el evento con el id del evento seleccionado
    var asignarInstructorBtn = document.getElementById('asignarInstructorBtn');
    var instructorSelect = document.getElementById('instructorSelect');
    var eventoId;

    $('#asignarInstructorModal').on('show.bs.modal', function (event) {
        // Obtiene el id del evento desde el botón que abrió el modal
        var button = $(event.relatedTarget); // Button that triggered the modal
        eventoId = button.data('id-evento');
    });

    // Asignar instructor
    asignarInstructorBtn.addEventListener('click', function() {
        var instructorId = instructorSelect.value;
        if (!instructorId) {
            alert('Por favor, selecciona un instructor.');
            return;
        }

        // Enviar la solicitud al servidor para asignar el instructor
        $.ajax({
            url: '/asignar-instructor', // Cambia esta URL por la ruta que uses para manejar la asignación
            method: 'POST',
            data: {
                eventoId: eventoId,
                instructorId: instructorId
            },
            success: function(response) {
                if (response.success) {
                    alert('Instructor asignado correctamente.');
                    location.reload(); // Recarga la página para reflejar los cambios
                } else {
                    alert('Hubo un error al asignar el instructor.');
                }
            },
            error: function() {
                alert('Hubo un error al procesar la solicitud.');
            }
        });
    });
</script>
