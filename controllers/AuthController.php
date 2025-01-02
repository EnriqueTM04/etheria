<?php

namespace Controllers;
require_once '../vendor/autoload.php';

use Dompdf\Dompdf;
use Classes\Email;
use Model\Competidor;
use Model\Usuario;
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

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        $alertas = Usuario::getAlertas();
        
        // Render a la vista 
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


    public static function mostrarReportes() {
        $reportes = Reporte::where("mejoresLugares", 'Primer lugar');
        include_once __DIR__ . '/../views/auth/reportes.php'; // Vista de la lista de reportes
    }
    
    public static function generarReportePDF() {
        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
    
        if (!$id) {
            die("ID no válido.");
        }
    
        $reporte = Reporte::find($id);
    
        if (!$reporte) {
            die("Reporte no encontrado.");
        }
    
        // Configuración del PDF
        $dompdf = new Dompdf();
        $html = "<h1>Reporte</h1>";
        $html .= "<p><strong>Tipo de Reporte:</strong> {$reporte->tipoReporte}</p>";
        $html .= "<p><strong>Mejores Lugares:</strong> {$reporte->mejoresLugares}</p>";
        $html .= "<p><strong>Datos Competidores:</strong> {$reporte->datosCompetidores}</p>";
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Reporte_{$reporte->id}.pdf", ['Attachment' => true]);
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
}