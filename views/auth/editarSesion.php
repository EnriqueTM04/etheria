<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Sesión</h1>
    <form action="/sesion/editar?id=<?php echo $sesion->id; ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo $sesion->id; ?>">
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $sesion->fecha; ?>" required>
        </div>
        <div class="form-group">
            <label for="hora">Hora</label>
            <input type="time" class="form-control" id="hora" name="hora" value="<?php echo $sesion->hora; ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo $sesion->descripcion; ?></textarea>
        </div>
        <div class="form-group">
            <label for="metrosRecorridos">Metros Recorridos</label>
            <input type="number" class="form-control" id="metrosRecorridos" name="metrosRecorridos" value="<?php echo $sesion->metrosRecorridos; ?>" required>
        </div>
        <div class="form-group">
            <label for="evento">Evento</label>
            <input type="hidden" name="idEvento" value="<?php echo $sesion->idEvento; ?>">
            <input type="text" class="form-control" id="evento" value="<?php echo $eventosPorId[$sesion->idEvento] ?? 'Evento no encontrado'; ?>" readonly>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
    </form>
</div>