
<div class="contenedorPrincipal">
    <div class="row g-0">
        <div class="col-sm-12 col-lg-6 col-md-6" id="columna1">
            <div id="contenedorImagen">
                <img src="../../public/build/img/imagenPrincipal.avif" alt="Imagen principal">
            </div>
        </div>
        <div class="col-sm-12 col-lg-6 col-md-6" id="columna2">
            
            <form class="form-group" action="/login" method="POST">
                <h2>Inicio de sesión</h2>
                <!-- Nombre de usuario -->
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre de usuario</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Ingrese usuario" required>
                </div>
                <!-- Contraseña -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                </div>
                <!-- Recordar sesión -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                    <label class="form-check-label" for="exampleCheck1">Recordar el inicio de sesión</label>
                </div>
                <!-- Botón de inicio -->
                <button type="submit" class="btn btn-primary">Acceder</button>
            </form>
        </div>
    </div>
</div>
