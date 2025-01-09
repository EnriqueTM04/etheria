<div class="container mt-5">
    <h1 class="text-center mb-4">Agregar Sesión</h1>
    <form action="/sesion/agregar" method="POST">
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
        </div>
        <div class="form-group">
            <label for="hora">Hora</label>
            <input type="time" class="form-control" id="hora" name="hora" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="metrosRecorridos">Metros Recorridos</label>
            <input type="number" class="form-control" id="metrosRecorridos" name="metrosRecorridos" required>
        </div>
        <div class="form-group">
            <label for="idEvento">Evento</label>
            <select class="form-control" id="idEvento" name="idEvento" required>
                <?php foreach($eventos as $evento): ?>
                    <option value="<?php echo $evento->id; ?>"><?php echo $evento->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Agregar Sesión</button>
    </form>
</div>