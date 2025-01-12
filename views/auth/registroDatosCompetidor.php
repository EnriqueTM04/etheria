<?php foreach ($alertas as $alerta): ?>
    <div class="alert alert-danger">
        <?php echo $alerta; ?>
    </div>
<?php endforeach; ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">Registro de Distancia y Tiempo</h1>
    <form action="/competidor/registro-datos" method="POST">
        <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th>Seleccionar Competidor</th>
                <th>Distancia Recorrida (m)</th>
                <th>Tiempo (min)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                <select name="idCompetidor" class="form-control">
                    <option value="" selected disabled>Seleccione Competidor</option>
                    <?php foreach ($listaCompetidores as $competidor): ?>
                        <option value="<?php echo $competidor->id; ?>"><?php echo $competidor->nombre; ?></option>
                    <?php endforeach; ?>
                </select>
                </td>
                <td>
                <input name="distancia" type="hidden" value="<?php echo $distancia; ?>">
                <input type="number" class="form-control bg-secondary" value="<?php echo $distancia; ?>" placeholder="Distancia en m" disabled>
                </td>
                <td>
                <input name="tiempo" type="number" class="form-control" placeholder="Tiempo en minutos">
                </td>
                <input type="hidden" name="idSesion" value="<?php echo $idSesion; ?>">
            </tr>
            </tbody>
        </table>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar Datos</button>
    </form>
</div>