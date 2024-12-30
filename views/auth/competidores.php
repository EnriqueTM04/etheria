<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Competidores</h1>
    <div class="table-responsive">
      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- Ejemplo de filas -->
           <?php foreach($competidores as $competidor): ?>
            <tr>
                <td><?php echo $competidor->nombre ?? ''; ?></td>
                <td><?php echo $competidor->edadCompetidor ?? ''; ?></td>
                <td><?php echo $competidor->genero ?? ''; ?></td>
                <td>
                <a href="/competidor/editar?id=<?php echo $competidor->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                <form action="/competidor/eliminar" method="POST">
                  <input type="hidden" name="id" value="<?php echo $competidor->id; ?>"></input>
                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
                </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <a href="/competidor/agregar" class="btn btn-primary mt-3">Agregar Competidor</a>
  </div>