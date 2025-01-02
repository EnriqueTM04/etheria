<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;

$router = new Router();

// *******************  LOGIN  ************************/
$router->get('/', [AuthController::class, 'index']);
$router->get('/login', [AuthController::class, 'login']);
$router->post('login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

$router->get('/descargar-reporte', [AuthController::class, 'descargarReporte']);

$router->get('/reconocimiento', [AuthController::class, 'reconocimiento']);
$router->get('/descargar-reconocimiento', 'Controllers\AuthController::descargarReconocimientoPorPersona');


//*******************  COMPETIDORES  ************************/
// Administrar los competidores de un Evento
$router->get('/evento/competidores', [AuthController::class, 'competidores']);

// Agregar Competidor
$router->get('/competidor/agregar', [AuthController::class, 'agregarCompetidor']);
$router->post('/competidor/agregar', [AuthController::class, 'agregarCompetidor']);

// Editar Competidor
$router->get('/competidor/editar', [AuthController::class, 'editarCompetidor']);
$router->post('/competidor/editar', [AuthController::class, 'editarCompetidor']);

// Eliminar Competidor
$router->post('/competidor/eliminar', [AuthController::class, 'eliminarCompetidor']);

$router->comprobarRutas();