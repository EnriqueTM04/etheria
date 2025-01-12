<div class="container mt-5">
    <h1 class="text-center mb-4">Historial del Competidor</h1>

    <!-- Datos del Competidor -->
    <div class="card mb-4">
      <div class="card-header text-center">
        Datos del Competidor
      </div>
      <div class="card-body">
        <div class="info-group">
          <span class="info-label">Nombre:</span>
          <span class="info-value"><?php echo $competidor->nombre; ?></span>
        </div>
        <div class="info-group">
          <span class="info-label">Edad:</span>
          <span class="info-value"><?php echo $competidor->edadCompetidor; ?></span>
        </div>
        <div class="info-group">
          <span class="info-label">Género:</span>
          <span class="info-value"><?php echo $competidor->genero; ?></span>
        </div>
        <div class="info-group">
          <span class="info-label">Contacto:</span>
          <span class="info-value"><?php echo $competidor->contacto; ?></span>
        </div>
        <div class="info-group">
          <span class="info-label">Historial Clínico:</span>
          <span class="info-value"><?php echo $competidor->historialClinico ?? 'No hay informacion para mostrar'; ?></span>
        </div>
      </div>
    </div>

    <!-- Historial de Competencias por Evento -->
    <h3 class="mb-4">Historial de Competencias</h3>

    <?php foreach ($eventos as $evento){ ?>
        <div class="card mb-3">
          <div class="card-header">
            <h4>Evento: <?php echo $evento->nombre; ?></h4>
            <p><strong>Fecha:</strong> <?php echo $evento->fechaInicio; ?></p>
          </div>
          <div class="card-body">
            <table class="table table-dark table-striped">
              <thead>
                <tr>
                  <th># Sesión</th>
                  <th>Distancia Recorrida (km)</th>
                  <th>Tiempo (min)</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($sesiones as $sesion) { 
                  $numero++?>
                    <tr>
                      <td><?php echo $numero; ?></td>
                      <td><?php echo $sesion->distancia; ?></td>
                      <td><?php echo $sesion->tiempo; ?></td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php } ?>

    <a href="/competidores" class="btn btn-primary mt-3">Regresar</a>
</div>
