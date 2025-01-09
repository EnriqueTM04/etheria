<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Evento</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $evento->id; ?>">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del evento" value="<?php echo $evento->nombre; ?>" required>
        </div>
        <div class="mb-3">
            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
            <input type="datetime-local" class="form-control" name="fechaInicio" id="fechaInicio" value="<?php echo $evento->fechaInicio; ?>" required>
        </div>
        <div class="mb-3">
            <label for="fechaPublicacion" class="form-label">Fecha de Publicación</label>
            <input type="date" class="form-control" name="fechaPublicacion" id="fechaPublicacion" value="<?php echo $evento->fechaPublicacion; ?>" required>
        </div>
        <div class="mb-3">
            <label for="fechaFinalizacion" class="form-label">Fecha de Finalización</label>
            <input type="datetime-local" class="form-control" name="fechaFinalizacion" id="fechaFinalizacion" value="<?php echo $evento->fechaFinalizacion; ?>" required>
        </div>
        <div class="mb-3">
            <label for="duracion" class="form-label">Duración</label>
            <input type="text" class="form-control" name="duracion" id="duracion" placeholder="Duración del evento" value="<?php echo $evento->duracion; ?>" required>
        </div>
        <div class="mb-3">
            <label for="modalidad" class="form-label">Modalidad</label>
            <input type="text" class="form-control" name="modalidad" id="modalidad" placeholder="Modalidad del evento" value="<?php echo $evento->modalidad; ?>" required>
        </div>
        <div class="mb-3">
            <label for="requisitos" class="form-label">Requisitos</label>
            <textarea class="form-control" name="requisitos" id="requisitos" rows="3" placeholder="Requisitos del evento" required><?php echo $evento->requisitos; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="convocatorias" class="form-label">Convocatorias</label>
            <textarea class="form-control" name="convocatorias" id="convocatorias" rows="3" placeholder="Convocatorias del evento" required><?php echo $evento->convocatorias; ?></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
</div>