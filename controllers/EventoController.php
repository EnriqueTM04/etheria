<?php

namespace Controllers;

use Model\Competidor;
use MVC\Router;
use Model\Evento;
use Model\Sesion;
use DateTime;

class EventoController {

    public static function competidores(Router $router) {
        $competidores = Competidor::all();
    
        $router->render('auth/competidores', [
            'competidores' => $competidores
        ]);
    }

    public static function agregarCompetidor(Router $router) {
        $competidor = new Competidor();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $competidor->sincronizar($_POST);
            
            $alertas = $competidor->validar();
    
            if (empty($alertas)) {
                $competidor->guardar();
                header('Location: /competidores');
            }
        }
    
        $router->render('auth/agregarCompetidor', [
            'competidor' => $competidor,
            'alertas' => $alertas ?? []
        ]);
    }

    public static function editarCompetidor(Router $router) {
        $id = $_GET['id'] ?? null;
    
        $competidor = Competidor::find($id);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $competidor->sincronizar($_POST);
    
            $alertas = $competidor->validar();
    
            if (empty($alertas)) {
                $competidor->guardar();
                header('Location: /competidores');
            }
        }
    
        $router->render('auth/editarCompetidor', [
            'competidor' => $competidor,
            'alertas' => $alertas ?? []
        ]);
    }

    public static function eliminarCompetidor() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;

            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if ($id) {
                $competidor = Competidor::find($id);
    
                if ($competidor) {
                    $competidor->eliminar();
                }
            }
        }

        header('Location: /competidores');
    }

    public static function competidorHistorial(Router $router) {

        $id = $_GET['id'] ?? null;
        $id = filter_var($id, FILTER_VALIDATE_INT);

        $competidor = Competidor::find($id);

        if (!$competidor) {
            header('Location: /competidores');
        }

        $router->render('auth/competidorHistorial', [
            'competidor' => $competidor
        ]);
    }

    public static function registroDatosCompetidor(Router $router) {
        $router->render('auth/registroDatosCompetidor');
    }


    // Eventos
    public static function eventos(Router $router) {
        $eventos = Evento::all();
    
        $router->render('auth/eventos', [
            'eventos' => $eventos
        ]);
    }

    public static function agregarEvento(Router $router) {
        $evento = new Evento();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $evento->sincronizar($_POST);
            
            $alertas = $evento->validar();
    
            if (empty($alertas)) {
                $evento->guardar();
                header('Location: /eventos');
            }
        }
    
        $router->render('auth/agregarEvento', [
            'evento' => $evento,
            'alertas' => $alertas ?? []
        ]);
    }

    public static function editarEvento(Router $router) {
        $id = $_GET['id'] ?? null;
    
        $evento = Evento::find($id);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $evento->sincronizar($_POST);
    
            $alertas = $evento->validar();
    
            if (empty($alertas)) {
                $evento->guardar();
                header('Location: /eventos');
            }
        }
    
        $router->render('auth/editarEvento', [
            'evento' => $evento,
            'alertas' => $alertas ?? []
        ]);
    }

    public static function eliminarEvento() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;

            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if ($id) {
                $evento = Evento::find($id);
    
                if ($evento) {
                    $evento->eliminar();
                }
            }
        }

        header('Location: /eventos');
    }


    // Sesiones
    public static function sesiones(Router $router) {
        $sesiones = Sesion::all();
        $eventos = Evento::all();
    
        // Crear un array asociativo de eventos con el id como clave
        $eventosPorId = [];
        foreach ($eventos as $evento) {
            $eventosPorId[$evento->id] = $evento->nombre;
        }
    
        $router->render('auth/sesiones', [
            'sesiones' => $sesiones,
            'eventosPorId' => $eventosPorId
        ]);
    }

    public static function agregarSesion(Router $router) {
        $sesion = new Sesion();
        $eventos = Evento::all(); // Asumiendo que tienes un modelo Evento para obtener todos los eventos
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sesion->sincronizar($_POST);
    
            // Obtener el evento correspondiente
            $evento = Evento::find($sesion->idEvento);
    
            // Validar que la fecha de la sesión esté entre las fechas del evento
            $fechaSesion = new DateTime($sesion->fechaHora);
            $fechaInicio = new DateTime($evento->fechaInicio);
            $fechaFinalizacion = new DateTime($evento->fechaFinalizacion);
    
            if ($fechaSesion < $fechaInicio || $fechaSesion > $fechaFinalizacion) {
                $alertas['fechaHora'] = 'La fecha de la sesión debe estar entre ' . $evento->fechaInicio . ' y ' . $evento->fechaFinalizacion . '.';
            } else {
                $resultado = $sesion->guardar();
    
                if ($resultado) {
                    header('Location: /sesiones');
                    exit;
                }
            }
        }
    
        $router->render('auth/agregarSesion', [
            'sesion' => $sesion,
            'eventos' => $eventos, // Pasar los eventos a la vista
            'alertas' => $alertas ?? []
        ]);
    }

    

    public static function editarSesion(Router $router) {
        $id = $_GET['id'] ?? null;
    
        $sesion = Sesion::find($id);
        $eventos = Evento::all();
    
        // Crear un array asociativo de eventos con el id como clave
        $eventosPorId = [];
        foreach ($eventos as $evento) {
            $eventosPorId[$evento->id] = $evento->nombre;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sesion->sincronizar($_POST);
    
            $alertas = $sesion->validar();
    
            if (empty($alertas)) {
                $sesion->guardar();
                header('Location: /sesiones');
                exit;
            }
        }
    
        $router->render('auth/editarSesion', [
            'sesion' => $sesion,
            'eventosPorId' => $eventosPorId,
            'alertas' => $alertas ?? []
        ]);
    }

    public static function eliminarSesion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;

            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if ($id) {
                $sesion = Sesion::find($id);
    
                if ($sesion) {
                    $sesion->eliminar();
                }
            }
        }

        header('Location: /sesiones');
    }


    


}

?>