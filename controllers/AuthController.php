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
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crear una instancia de Usuario con los datos enviados por el formulario
            $auth = new Usuario($_POST);
    
            // Buscar al usuario en la base de datos
            $usuario = Usuario::buscarPorUsername($auth->username);
    
            // Verificar si existe y si la contraseña es válida
            if ($usuario && $usuario->validarLogin($auth->password)) {
                // Iniciar sesión
                session_start();
                $_SESSION['id'] = $usuario->id;
                $_SESSION['username'] = $usuario->username;
    
                // Redirigir al dashboard o página principal
                header('Location: /dashboard');
                exit;
            } else {
                // Usuario no encontrado o contraseña incorrecta
                Usuario::setAlerta('error', 'El usuario o la contraseña son incorrectos');
            }
        }
    
        // Obtener alertas (errores)
        $alertas = Usuario::getAlertas();
    
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
    
    
}