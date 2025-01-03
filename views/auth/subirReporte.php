<main>
    <h1>Subir Reporte</h1>
    <form action="/subir-reporte" method="POST">
        <!-- Campo para el tipo de reporte -->
        <div>
            <label for="tipoReporte">Tipo de Reporte:</label>
            <input type="text" id="tipoReporte" name="tipoReporte" required>
        </div>

        <!-- Campo para los mejores lugares -->
        <div>
            <label for="mejoresLugares">Mejores Lugares:</label>
            <select id="mejoresLugares" name="mejoresLugares" required>
                <option value="primer lugar">Primer Lugar</option>
                <option value="segundo lugar">Segundo Lugar</option>
                <option value="tercer lugar">Tercer Lugar</option>
            </select>
        </div>

        <!-- Campos para "Datos Competidores" -->
        <h2>Información del Competidor</h2>
        <div>
            <label for="nombreCompleto">Nombre Completo:</label>
            <input type="text" id="nombreCompleto" name="nombreCompleto" required>
        </div>
        <div>
            <label for="instructor">Instructor:</label>
            <input type="text" id="instructor" name="instructor" required>
        </div>
        <div>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>
        </div>
        <div>
            <label for="genero">Género:</label>
            <select id="genero" name="genero" required>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
            </select>
        </div>
        <div>
            <label for="categoria">Categoría:</label>
            <input type="text" id="categoria" name="categoria" required>
        </div>
        <div>
            <label for="distanciaRecorrida">Distancia Recorrida:</label>
            <input type="text" id="distanciaRecorrida" name="distanciaRecorrida">
        </div>
        <div>
            <label for="vueltas">Vueltas:</label>
            <input type="number" id="vueltas" name="vueltas" required>
        </div>
        <div>
            <label for="descripcionVueltas">Descripción de Vueltas:</label>
            <textarea id="descripcionVueltas" name="descripcionVueltas" rows="4"></textarea>
        </div>
        <div>
            <label for="club">Club:</label>
            <input type="text" id="club" name="club" required>
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit" class="button">Subir Reporte</button>
    </form>
</main>
