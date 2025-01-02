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


    public static function descargarReporte($id) {
        // Obtén el reporte desde la base de datos
        $reporte = Reporte::find($id);
    
        if (!$reporte) {
            die("Reporte no encontrado.");
        }
    
        // Generar el HTML para el PDF
        ob_start();
        include __DIR__ . '/../views/auth/reporte_pdf.php';
        $html = ob_get_clean();
    
        // Crear y configurar Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait'); // Papel tamaño A4 en orientación vertical
        $dompdf->render();
    
        // Descargar el PDF
        $dompdf->stream("reporte_$id.pdf", ["Attachment" => true]);
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