<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;

$router = new Router();

// Login
$router->get('/', [AuthController::class, 'index']);
$router->get('/login', [AuthController::class, 'login']);
$router->post('login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);
$router->get('/reporte', [AuthController::class, 'reporte']);
$router->get('/reconocimiento', [AuthController::class, 'reconocimiento']);
$router->get('/descargar-reconocimiento', 'Controllers\AuthController::descargarReconocimientoPorPersona');



$router->comprobarRutas();