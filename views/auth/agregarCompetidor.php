<div class="container mt-5">
  <h1 class="text-center mb-4">Agregar Competidor</h1>
  <form method="POST" action="/competidor/agregar">
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del competidor" value="<?php echo $competidor->nombre ?? ''; ?>">
    </div>
    <div class="mb-3">
      <label for="edadCompetidor" class="form-label">Edad</label>
      <input type="number" class="form-control" name="edadCompetidor" id="edadCompetidor" placeholder="Edad del competidor" value="<?php echo $competidor->edadCompetidor ?? ''; ?>">
    </div>
    <div class="mb-3">
      <label for="genero" class="form-label">Género</label>
      <select name="genero" class="form-control" id="genero">
        <option value="">Seleccione género</option>
        <option value="masculino">Masculino</option>
        <option value="femenino">Femenino</option>
        <option value="otro">Otro</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="contacto" class="form-label">Contacto</label>
      <input type="text" class="form-control" id="contacto" placeholder="Número o email de contacto" name="contacto" value="<?php echo $competidor->contacto ?? ''; ?>">
    </div>
    <div class="mb-3">
      <label for="historialClinico" class="form-label">Historial Clínico</label>
      <textarea class="form-control" id="historialClinico" rows="3" placeholder="Detalles del historial clínico" name="historialClinico"><?php echo $competidor->historialClinico; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </form>
</div>