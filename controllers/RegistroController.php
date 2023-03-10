<?php

namespace Controllers;


use MVC\Router;

use Model\Paquete;

use Model\Usuario;
use Model\Ponente;
use Model\Categoria;
use Model\Evento;
use Model\Regalo;
use Model\Registro;
use Model\EventosRegistros;


class RegistroController {

    public static function crear(Router $router) {

        if(!is_auth()) {
            header('Location: /');
            return;
        }

         //Verificar si el usuario ya esta registrado
       $registro = Registro::where('usuario_id', $_SESSION['id']);

        if(isset($registro) && ($registro->paquete_id === "3" || $registro->paquete_id === "2" )) {
           header('Location: /boleto?id=' . urlencode($registro->token));
          return;
        }

        if(isset($registro) && $registro->paquete_id === "1") {
            header('Location: /finalizar-registro/conferencias');
            return;
        }

        $router->render('registro/crear', [
            'titulo' => 'Finalizar Compra'
        ]);
    }

    public static function boleto(Router $router) {

        // Validar la URL
        $id = $_GET['id'];

        // buscarlo en la BD
        $registro = Registro::where('token', $id);
        if(!$registro) {
            header('Location: /');
            return;
        }
        // Llenar las tablas de referencia
        $registro->usuario = Usuario::find($registro->usuario_id);
        $registro->paquete = Paquete::find($registro->paquete_id);

        $router->render('registro/boleto', [
            'titulo' => 'Asistencia al Evento',
            'registro' => $registro
        ]);
    }
    
    public static function pagar(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
                return;
            }

            // Validar que Post no venga vacio
            if(empty($_POST)) {
                echo json_encode([]);
                return;
            }

            // Crear el registro
            $datos = $_POST;
            $datos['token'] = substr( md5(uniqid( rand(), true )), 0, 8);
            $datos['usuario_id'] = $_SESSION['id'];
            
            try {
                $registro = new Registro($datos);
          
                $resultado = $registro->guardar();

                
                echo json_encode($resultado);

                //debuguear($resultado);
            } catch (\Throwable $th) {
                echo json_encode([
                    'resultado' => 'error'
                ]);
            }

        }
    }


}