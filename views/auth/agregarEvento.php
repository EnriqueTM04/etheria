<div class="container mt-5">
    <h1 class="text-center mb-4">Agregar Evento</h1>
    <form action="/evento/agregar" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="fechaInicio">Fecha de Inicio</label>
            <input type="datetime-local" class="form-control" id="fechaInicio" name="fechaInicio" required>
        </div>
        <div class="form-group">
            <label for="fechaPublicacion">Fecha de Publicación</label>
            <input type="date" class="form-control" id="fechaPublicacion" name="fechaPublicacion" required>
        </div>
        <div class="form-group">
            <label for="fechaFinalizacion">Fecha de Finalización</label>
            <input type="datetime-local" class="form-control" id="fechaFinalizacion" name="fechaFinalizacion" required>
        </div>
        <div class="form-group">
            <label for="duracion">Duración</label>
            <input type="text" class="form-control" id="duracion" name="duracion" required>
        </div>
        <div class="form-group">
            <label for="modalidad">Modalidad</label>
            <input type="text" class="form-control" id="modalidad" name="modalidad" required>
        </div>
        <div class="form-group">
            <label for="requisitos">Requisitos</label>
            <textarea class="form-control" id="requisitos" name="requisitos" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="convocatorias">Convocatorias</label>
            <textarea class="form-control" id="convocatorias" name="convocatorias" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar Evento</button>
    </form>
</div>