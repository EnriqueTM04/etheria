<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Sesiones</h1>
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