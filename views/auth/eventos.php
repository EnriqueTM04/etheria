<?php
// filepath: /path/to/includes/config.php

// Inicia la sesión si no se ha iniciado ya
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Otras configuraciones globales pueden ir aquí
?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Eventos</h1>
    <div class="table-responsive">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Publicación</th>
            <th>Fecha de Finalización</th>
            <th>Duración</th>
            <th>Modalidad</th>
            <th>Requisitos</th>
            <th>Convocatorias</th>
            <th>Acciones</th>
            <th>Ver Detalles</th>
          </tr>
        </thead>
        <tbody>
          <!-- Ejemplo de filas -->
           <?php foreach($eventos as $evento): ?>
            <tr>
                <td><?php echo $evento->nombre ?? ''; ?></td>
                <td><?php echo $evento->fechaInicio ?? ''; ?></td>
                <td><?php echo $evento->fechaPublicacion ?? ''; ?></td>
                <td><?php echo $evento->fechaFinalizacion ?? ''; ?></td>
                <td><?php echo $evento->duracion ?? ''; ?></td>
                <td><?php echo $evento->modalidad ?? ''; ?></td>
                <td><?php echo $evento->requisitos ?? ''; ?></td>
                <td><?php echo $evento->convocatorias ?? ''; ?></td>
                <td>
                <a href="/evento/editar?id=<?php echo $evento->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                <form action="/evento/eliminar" method="POST">
                  <input type="hidden" name="id" value="<?php echo $evento->id; ?>"></input>
                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
                </td>
                <td>
                  <a href="/evento/detalles?id=<?php echo $evento->id; ?>" class="btn btn-primary btn-sm">Ver Detalles</a>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <a href="/evento/agregar" class="btn btn-primary mt-3">Agregar Evento</a>
  </div>