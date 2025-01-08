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


//*********************RECONOCIMIENTO*****************************/
$router->get('/reconocimiento', [AuthController::class, 'reconocimiento']);
$router->get('/descargar-reconocimiento', 'Controllers\AuthController::descargarReconocimientoPorPersona');



//*********************REPORTE***********************************/
$router->get('/reportes', [AuthController::class, 'reportes']);
$router->get('/descargar-reporte', 'Controllers\AuthController::generarReportePDF');
$router->get('/generar-reporte', [AuthController::class, 'generarReportePDF']);
$router->get('/mostrar-reporte', [AuthController::class, 'mostrarReporte']);
$router->post('/subir-reporte', [AuthController::class, 'procesarFormularioReporte']);


//*******************  COMPETIDORES  ************************/
// Administrar los competidores de un Evento
$router->get('/competidores', [EventoController::class, 'competidores']);

// Agregar Competidor
$router->get('/competidor/agregar', [EventoController::class, 'agregarCompetidor']);
$router->post('/competidor/agregar', [EventoController::class, 'agregarCompetidor']);

// Editar Competidor
$router->get('/competidor/editar', [EventoController::class, 'editarCompetidor']);
$router->post('/competidor/editar', [EventoController::class, 'editarCompetidor']);

// Eliminar Competidor
$router->post('/competidor/eliminar', [EventoController::class, 'eliminarCompetidor']);

// Ver Historial de Competidor
$router->get('/competidor/historial', [EventoController::class, 'competidorHistorial']);


//*******************  SESIONES ************************/
// Registrar Distancia y Tiempo
$router->get('/competidor/registro-datos', [EventoController::class, 'registroDatosCompetidor']);
$router->post('/competidor/registro-datos', [EventoController::class, 'registroDatosCompetidor']);



//*******************  EVENTOS  ************************/
// Administrar los eventos
$router->get('/eventos', [EventoController::class, 'eventos']);

$router->comprobarRutas();