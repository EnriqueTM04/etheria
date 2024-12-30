<?php

namespace Controllers;
require_once '../vendor/autoload.php';

use Dompdf\Dompdf;
use Model\Competidor;
use Model\Reconocimiento;
use Model\Reporte;

use MVC\Router;

class AuthController {

    public static function index(Router $router) {
        $variable = 14;

        $competidor = new Competidor();

        $competidor->setNombre('Juan');

        $competidor->guardar();



        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $variable = 15;
        }
        $router->render('auth/login', [
            'variable' => $variable,
        ]);
    }

    public static function login(Router $router) {
        $alertas = [];
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
    
        // Renderizar la vista con las alertas
        $router->render('auth/login', [
            'alertas' => $alertas
        ]);
    }

    public static function logout() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        }
       
    }

    public static function reconocimiento(Router $router) {
        $reconocimientos = Reconocimiento::where("meritos", 'Primer lugar');
    
        $router->render('auth/reconocimiento', [
            'reconocimientos' => $reconocimientos,
        ]);
    }

    public static function reporte(Router $router) {
        $reportes = Reporte::where("tipoReporte", 'Estadistico');
    
        $router->render('auth/reporte', [
            'reportes' => $reportes,
        ]);
    }

    
    public static function descargarReconocimientoPorPersona(Router $router) {
        $id = $_GET['id'] ?? null; // Obtener el ID del reconocimiento
    
        if ($id) {
            $reconocimiento = Reconocimiento::find($id); // Buscar el reconocimiento por ID
    
            if ($reconocimiento) {
                // Generar el HTML para el PDF
                ob_start();
                include '../views/auth/reconocimiento_individual_pdf.php'; // Vista específica para un reconocimiento
                $html = ob_get_clean();
    
                // Configurar y generar el PDF
                $dompdf = new Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4');
                $dompdf->render();
    
                // Descargar el PDF
                $dompdf->stream("reconocimiento_{$reconocimiento->competidor}.pdf", ['isInline' => false]);
                exit;
            } else {
                echo 'Reconocimiento no encontrado.';
            }
        } else {
            echo 'ID no proporcionado.';
        }
    }

    public static function competidores(Router $router) {
        $competidores = Competidor::all();
    
        $router->render('auth/competidores', [
            'competidores' => $competidores,
        ]);
    }

    public static function agregarCompetidor(Router $router) {
        $competidor = new Competidor();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $competidor->sincronizar($_POST);
    
            $alertas = $competidor->validar();
    
            if (empty($alertas)) {
                $competidor->guardar();
                header('Location: /evento/competidores');
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
                header('Location: /evento/competidores');
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

        header('Location: /evento/competidores');
    }
    
    
}