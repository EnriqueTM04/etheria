<div class="container mt-5">
    <h1 class="text-center mb-4">Registro de Distancia y Tiempo</h1>
    <form>
        <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th>Seleccionar Competidor</th>
                <th>Distancia Recorrida (km)</th>
                <th>Tiempo (min)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                <select class="form-control">
                    <option value="">Seleccione Competidor</option>
                    <option value="1">Juan</option>
                    <option value="2">Ana</option>
                    <option value="3">Luis</option>
                </select>
                </td>
                <td>
                <input type="number" class="form-control" placeholder="Distancia en km">
                </td>
                <td>
                <input type="number" class="form-control" placeholder="Tiempo en minutos">
                </td>
            </tr>
            <!-- Más filas si es necesario -->
            </tbody>
        </table>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar Registro</button>
    </form>
</div>