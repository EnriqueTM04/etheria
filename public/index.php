<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\EventoController;

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
$router->get('/evento/competidores', [EventoController::class, 'competidores']);

// Agregar Competidor
$router->get('/competidor/agregar', [EventoController::class, 'agregarCompetidor']);
$router->post('/competidor/agregar', [EventoController::class, 'agregarCompetidor']);

// Editar Competidor
$router->get('/competidor/editar', [EventoController::class, 'editarCompetidor']);
$router->post('/competidor/editar', [EventoController::class, 'editarCompetidor']);

// Eliminar Competidor
$router->post('/competidor/eliminar', [EventoController::class, 'eliminarCompetidor']);

$router->comprobarRutas();