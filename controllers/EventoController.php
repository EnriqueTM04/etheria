<?php

namespace Controllers;

use Model\Competidor;
use MVC\Router;

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
        $router->render('auth');
    }

}

?>