<?php

namespace Controllers;


use MVC\Router;

class DashboardController {

    public static function index(Router $router) {   //mandamos a la ruta vista (dashboard)
            $router->render('admin/dashboard/index', [
                'titulo' => 'Panel Administrativo',

            ]);   
    }
}