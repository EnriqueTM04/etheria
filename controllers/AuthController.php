<?php

namespace Controllers;
require_once '../vendor/autoload.php';

use Dompdf\Dompdf;
use Classes\Email;
use Model\Competidor;
use Model\Instructor;
use Model\Usuario;
use Model\Reconocimiento;
use Model\Reporte;

use MVC\Router;

class AuthController
{

    public static function index(Router $router)
    {
        $variable = 14;

        $competidor = new Competidor();

        $competidor->setNombre('Juan');

        $competidor->guardar();



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $variable = 15;
        }
        $router->render('auth/login', [
            'variable' => $variable,
        ]);
    }

    public static function registro(Router $router)
    {
        $alertas = [];
        $exito = false;

        // Renderizar la vista para mostrar el formulario
        $router->render('auth/registro', [
            'alertas' => $alertas,
            'exito' => $exito
        ]);
    }

    public static function registrar(Router $router)
{
    $alertas = [];
    $exito = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener datos del formulario
        $nombre = $_POST['nombre'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $pass = $_POST['pass'] ?? '';
        $rol = $_POST['rol'] ?? 'instructor';

        // Validar que los campos obligatorios estén presentes
        if (!$nombre || !$correo || !$pass || !$rol) {
            $alertas[] = 'Todos los campos son obligatorios.';
        } else {
            // Encriptar la contraseña
            $passHash = password_hash($pass, PASSWORD_BCRYPT);

            // Construir la consulta SQL
            $query = "INSERT INTO Instructor (nombre, correo, pass, rol, idEvento) 
                      VALUES ('$nombre', '$correo', '$passHash', '$rol', NULL)";

            // Conectar a la base de datos usando la clase global \mysqli
            $db = new \mysqli('clubdeleones.etheria.com.mx', 'u899317091_admin', 'Escom2002', 'u899317091_clubleones');

            if ($db->connect_error) {
                $alertas[] = 'Error al conectar a la base de datos.';
            } else {
                // Ejecutar la consulta
                if ($db->query($query)) {
                    $exito = true;
                    header('Location: /login'); // Redirigir en caso de éxito
                    exit;
                } else {
                    $alertas[] = 'Hubo un error al registrar el instructor: ' . $db->error;
                }
                $db->close(); // Cerrar la conexión
            }
        }
    }

    // Renderizar la vista de registro con alertas
    $router->render('auth/registro', [
        'alertas' => $alertas,
        'exito' => $exito
    ]);
}

public static function login(Router $router)
{
    $alertas = [];
    $usuario = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $correo = $_POST['correo'] ?? '';
        $pass = $_POST['pass'] ?? '';

        if (!$correo || !$pass) {
            $alertas[] = 'Correo y contraseña son obligatorios.';
        } else {
            // Consulta para obtener el usuario con el correo proporcionado
            $query = "SELECT * FROM Instructor WHERE correo = '$correo' LIMIT 1";
            $db = new \mysqli('clubdeleones.etheria.com.mx', 'u899317091_admin', 'Escom2002', 'u899317091_clubleones');

            if ($db->connect_error) {
                $alertas[] = 'Error al conectar a la base de datos.';
            } else {
                $resultado = $db->query($query);

                if ($resultado->num_rows > 0) {
                    $usuario = $resultado->fetch_assoc(); // Obtener el primer resultado (usuario)

                    // Verificar si la contraseña proporcionada coincide con la almacenada (encriptada)
                    if (password_verify($pass, $usuario['pass'])) {
                        session_start();
                        $_SESSION['usuario_id'] = $usuario['id'];
                        $_SESSION['usuario_nombre'] = $usuario['nombre'];
                        $_SESSION['usuario_rol'] = $usuario['rol'];

                        header('Location: /menu'); // Redirigir en caso de éxito
                        exit;
                    } else {
                        $alertas[] = 'Contraseña incorrecta.';
                    }
                } else {
                    $alertas[] = 'El correo no está registrado.';
                }

                $db->close(); // Cerrar la conexión
            }
        }
    }

    $router->render('auth/login', [
        'alertas' => $alertas
    ]);
}


    public static function menuPrincipal(Router $router)
    {
        session_start();

        // Obtener el rol del usuario desde la sesión
        $rolActual = $_SESSION['usuario_rol'] ?? 'Invitado';

        // Renderizar la vista y pasar datos
        $router->render('auth/menu', [
            'titulo' => 'Menú Principal',
            'subtitulo' => 'Bienvenido al Menú Principal',
            'rolActual' => $rolActual
        ]);
    }

    public static function acercaNosotros(Router $router)
    {
        $router->render('auth/acercaNosotros', [
            'titulo' => 'Acerca de Nosotros',
            'subtitulo' => 'Conoce más sobre nosotros'
        ]);
    }

    public static function contacto(Router $router)
    {
        $router->render('auth/contacto', [
            'titulo' => 'Contacto',
            'subtitulo' => 'Contactanos'
        ]);
    }

    public static function soporte(Router $router)
    {
        $router->render('auth/soporte', [
            'titulo' => 'Soporte',
            'subtitulo' => 'Soporte'
        ]);
    }


    public static function logout()
    {
        session_start(); // Asegúrate de iniciar la sesión antes de manipularla.

        // Destruir la sesión
        $_SESSION = []; // Vaciar el array de sesión.
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy(); // Destruir la sesión.

        // Redirigir al login
        header('Location: /login');
        exit;
    }


    public static function reconocimiento(Router $router)
    {
        $reconocimientos = Reconocimiento::where("meritos", 'Primer lugar');

        $router->render('auth/reconocimiento', [
            'reconocimientos' => $reconocimientos,
        ]);
    }


    public static function reportes(Router $router)
    {
        $primerLugar = Reporte::where('mejoresLugares', 'Primer lugar');
        $segundoLugar = Reporte::where('mejoresLugares', 'Segundo lugar');
        $tercerLugar = Reporte::where('mejoresLugares', 'Tercer lugar');

        // Combinar todos los reportes en un solo arreglo
        $reportes = array_merge($primerLugar, $segundoLugar, $tercerLugar);

        $router->render('auth/reporte', [
            'reportes' => $reportes,
        ]);
    }


    public static function generarReportePDF()
    {
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
    public static function mostrarReporte($router)
    {
        $router->render('auth/subirReporte', [

        ]);
    }

    public static function procesarFormularioReporte()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipoReporte = htmlspecialchars($_POST['tipoReporte'] ?? '');
            $mejoresLugares = htmlspecialchars($_POST['mejoresLugares'] ?? '');

            // Combinar información de los competidores
            $datosCompetidores = "Información General del Competidor\n";
            $datosCompetidores .= "Nombre Completo: " . htmlspecialchars($_POST['nombreCompleto'] ?? '') . "\n";
            $datosCompetidores .= "Instructor: " . htmlspecialchars($_POST['instructor'] ?? '') . "\n";
            $datosCompetidores .= "Edad: " . htmlspecialchars($_POST['edad'] ?? '') . " años\n";
            $datosCompetidores .= "Género: " . htmlspecialchars($_POST['genero'] ?? '') . "\n";
            $datosCompetidores .= "Categoría: " . htmlspecialchars($_POST['categoria'] ?? '') . "\n";
            $datosCompetidores .= "Distancia recorrida: " . htmlspecialchars($_POST['distanciaRecorrida'] ?? 'No aplica') . "\n";
            $datosCompetidores .= "Vueltas: " . htmlspecialchars($_POST['vueltas'] ?? '0') . "\n";
            $datosCompetidores .= "Descripcion de vueltas:\n" . htmlspecialchars($_POST['descripcionVueltas'] ?? '') . "\n";
            $datosCompetidores .= "Club: " . htmlspecialchars($_POST['club'] ?? '');

            // Guardar el reporte
            if ($tipoReporte && $mejoresLugares && $datosCompetidores) {
                $reporte = new Reporte();
                $reporte->tipoReporte = $tipoReporte;
                $reporte->mejoresLugares = $mejoresLugares;
                $reporte->datosCompetidores = $datosCompetidores;

                $resultado = $reporte->guardar();

                if ($resultado) {
                    // Generar reconocimientos para "primer lugar"
                    if (strtolower($mejoresLugares) === 'primer lugar') {
                        $competidores = explode("\n", $datosCompetidores);
                        foreach ($competidores as $linea) {
                            if (preg_match('/Nombre Completo:\s*(.+)/', $linea, $matches)) {
                                $nombre = trim($matches[1]);

                                $reconocimiento = new Reconocimiento([
                                    'competidor' => $nombre,
                                    'descripcion' => 'Reconocimiento por obtener el Primer Lugar',
                                    'evento' => $mejoresLugares,
                                    'meritos' => 'Primer Lugar',
                                ]);

                                $reconocimiento->guardar();
                            }
                        }
                    }

                    header('Location: /reportes');
                    exit;
                } else {
                    echo "Hubo un error al guardar el reporte.";
                }
            } else {
                echo "Todos los campos son obligatorios.";
            }
        }
    }



    public static function descargarReconocimientoPorPersona(Router $router)
    {
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