<div class="contenedorPrincipal">
    <style>
       #columnaImagen {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden; /* Asegura que nada se salga del contenedor */
    height: 100%; /* Ocupa toda la altura disponible del contenedor */
}

#columnaImagen img {
    max-width: 100%; /* La imagen no será más ancha que el contenedor */
    height: auto; /* Mantiene las proporciones */
    object-fit: cover; /* Ajusta la imagen para que cubra el espacio */
    border-radius: 8px; /* Opcional: da bordes redondeados a la imagen */
}


 /* Establecer el fondo para toda la página */
        body {
            background-color: rgb(0, 0, 0); /* Fondo negro */
            color: white; /* Texto blanco para contraste */
            font-family: Arial, sans-serif;
        }

        /* Asegura que la columna de la imagen ocupe el 50% de la pantalla */
        #columnaImagen {
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Estilos para la imagen */
        #columnaImagen img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center center;
            border-radius: 8px;
        }

        /* Estilo para el formulario */
        .col-sm-12.col-lg-6 {
            height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            width: 80%;
            max-width: 500px;
            background: rgba(34, 34, 34, 0.9); /* Fondo oscuro translúcido */
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ffcc00; /* Borde amarillo */
        }

        /* Títulos y etiquetas */
        h2 {
            color: #ffcc00; /* Títulos en amarillo */
        }

        .form-label {
            color: #ffcc00; /* Etiquetas en amarillo */
        }

        /* Campos de texto y combobox */
        .form-control,
        .form-select {
            background-color: #222; /* Fondo oscuro */
            color: #fff; /* Texto blanco */
            border: 1px solid #ffcc00; /* Borde amarillo */
        }

        .form-control::placeholder,
        .form-select option {
            color: #ffcc00; /* Placeholder y opciones en amarillo */
        }

        /* Opciones dentro del select */
        .form-select option {
            background-color: #222; /* Fondo oscuro para las opciones */
            color: #ffcc00; /* Texto amarillo */
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            box-shadow: 0 0 5px #ffcc00; /* Efecto amarillo al enfocar */
            border-color: #e6b800; /* Borde amarillo más brillante */
        }

        /* Botón */
        .btn-primary {
            background-color: #ffcc00;
            border: none;
            color: #222;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #e6b800;
        }

        /* Enlaces */
        .text-decoration-underline {
            text-decoration: underline;
            color: #ffcc00;
        }

        .text-decoration-underline:hover {
            color: #e6b800;
        }
    </style>

<div class="row g-0">
    <div class="col-lg-6 d-none d-lg-block" id="columnaImagen">
        <img src="https://images2.alphacoders.com/132/thumb-1920-1327482.png" alt="Imagen de registro" class="img-fluid">
    </div>
    <div class="col-sm-12 col-lg-6">
        <form class="form-group p-4" action="/registro/registrar" method="POST">
            <h2 class="text-center mb-4">Registro de Usuario</h2>

            <!-- Mensajes de alerta -->
            <?php if (!empty($alertas)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($alertas as $alerta): ?>
                        <p><?= htmlspecialchars($alerta) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre completo" required>
            </div>

            <!-- Rol -->
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" id="rol" name="rol" required>
                    <option value="" selected disabled>Selecciona un rol</option>
                    <option value="Instructor">Instructor</option>
                    <option value="Instructor con privilegios">Instructor con privilegios</option>
                    <option value="Organizador">Organizador</option>
                </select>
            </div>

            <!-- Correo -->
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" required>
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Crea una contraseña segura" required>
            </div>

            <!-- Confirmar contraseña -->
            <div class="mb-3">
                <label for="confirm_pass" class="form-label">Confirma tu contraseña</label>
                <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" placeholder="Confirma tu contraseña" required>
            </div>

            <!-- Botón de registro -->
            <button type="submit" class="btn btn-primary w-100">Registrarme</button>

            <!-- Enlace al inicio de sesión -->
            <p class="text-center mt-3">
                ¿Ya tienes una cuenta? <a href="/login" class="text-decoration-underline">Inicia sesión aquí</a>.
            </p>
        </form>
    </div>
</div>

