<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Club de Leones</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/acercaNosotros.php">Acerca de Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Soporte</a>
                </li>
            </ul>
            <span class="navbar-text ms-auto">
                <?php
                // Verifica si la sesión está activa y muestra el usuario con el rol
                if (isset($_SESSION['usuario_nombre']) && isset($_SESSION['usuario_rol'])) {
                    echo htmlspecialchars($_SESSION['usuario_nombre']) . ' | ' . htmlspecialchars($_SESSION['usuario_rol']);
                } else {
                    echo '';
                }
                ?>
            </span>
        </div>
    </div>
</nav>
