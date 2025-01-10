<?php
// filepath: /c:/Users/domo_/OneDrive - Instituto Politecnico Nacional/5to Semestre ESCOM/ADS/etheria/views/auth/sesiones.php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluir el archivo de configuración y el modelo Instructor
require_once dirname(__DIR__, 3) . '/includes/.php'; // Ajusta la ruta según tu estructura
require_once dirname(__DIR__, 3) . '/../../models/Instructor.php'; // Ajusta la ruta según tu estructura
use Model I  
$usuarioRol = '';

// Verificar si el usuario está logueado
if (isset($_SESSION['usuario_id'])) {
    // Obtener el Instructor desde el modelo
    $instructor = Instructor::find($_SESSION['usuario_id']);

    if ($instructor) {
        $usuarioRol = htmlspecialchars($instructor->rol);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesiones</title>
    <!-- Enlaza tus hojas de estilo y scripts aquí -->
</head>
<body>
    <?php include 'views/templates/header.php'; ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Sesiones</h1>
        <p>Rol del usuario: <?php echo $usuarioRol; ?></p>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Descripción</th>
                        <th>Metros Recorridos</th>
                        <th>Evento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ejemplo de filas -->
                    <?php foreach($sesiones as $sesion): ?>
                        <tr>
                            <td><?php echo $sesion->fecha ?? ''; ?></td>
                            <td><?php echo $sesion->hora ?? ''; ?></td>
                            <td><?php echo $sesion->descripcion ?? ''; ?></td>
                            <td><?php echo $sesion->metrosRecorridos ?? ''; ?></td>
                            <td><?php echo $eventosPorId[$sesion->idEvento] ?? 'Evento no encontrado'; ?></td>
                            <td>
                                <a href="/sesion/editar?id=<?php echo $sesion->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                                <form action="/sesion/eliminar" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $sesion->id; ?>"></input>
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="/sesion/agregar" class="btn btn-primary mt-3">Agregar Sesión</a>
    </div>
</body>
</html>