<?php

namespace Controllers;

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

        //$competidor->setDatos('hdhd');

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

    public static function reconocimiento(Router $router){
        $reconocimiento=new Reconocimiento();
        $reconocimientos= Reconocimiento::all();
        $router->render('auth/reconocimiento', [
            'reconocimientos' => $reconocimientos,
        ]);
    }

}