<?php

namespace Controllers;

use Model\Categoria;
use MVC\Router;
use Model\Ponente;
use Model\Evento;
class PaginasController {
// Controlador de Index - Pagina principal
    public static function index(Router $router) {

        $eventos = Evento::ordenar('hora', 'ASC');  //horas proximas 4, 5,6
        //debuguear($eventos);

        $eventos_formateados = [];
        foreach($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);  // para tener la información
            $evento->ponente = Ponente::find($evento->ponente_id);// para tener la información
            
            
            if($evento->categoria_id == "1")  //si la tabla evento en la categoria 1
            {
                $eventos_formateados['eventos_categoria_1'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
            if($evento->categoria_id == "2")  //si la tabla evento en la categoria 2
            {
                $eventos_formateados['eventos_categoria_2'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
            if($evento->categoria_id == "3")  //si la tabla evento en la categoria 3
            {
                $eventos_formateados['eventos_categoria_3'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
            if($evento->categoria_id == "4")  //si la tabla evento en la categoria 4
            {
                $eventos_formateados['eventos_categoria_4'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
            if($evento->categoria_id == "5")  //si la tabla evento en la categoria 5
            {
                $eventos_formateados['eventos_categoria_5'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
            if($evento->categoria_id == "6")  //si la tabla evento en la categoria 6
            {
                $eventos_formateados['eventos_categoria_6'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
        } 

        // Obtener el total para el resumen   
        $ponentes_total = Ponente::total();
        $eventos_total = Evento::total();
        // Obtener todos los ponentes
        $ponentes = Ponente::all();
        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'ponentes_total' => $ponentes_total,
            'eventos_total' => $eventos_total,
            'ponentes' => $ponentes,
            'eventos' => $eventos_formateados
        ]);
    }


// Controlador de Sobre nosotros
    public static function nosotros(Router $router) {
        
        $router->render('paginas/sobrenosotros', [
            'titulo' => 'Sobre TicketHub'
        ]);
    }
// Controlador de Organizadores
    public static function organizadores(Router $router) {
        $ponentes = Ponente::all();
        $router->render('paginas/organizadores', [
            'titulo' => 'Organizadores',
            'ponentes' => $ponentes
        ]);
    }
// Controlador de Eventos
    public static function eventos(Router $router) {
        $eventos = Evento::ordenar('hora', 'ASC');  //horas proximas 4, 5,6
        //debuguear($eventos);

        $eventos_formateados = [];
        foreach($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);  // para tener la información
            $evento->ponente = Ponente::find($evento->ponente_id);// para tener la información
            
            if($evento->categoria_id == "1")  //si la tabla evento en la categoria 1
            {
                $eventos_formateados['eventos_categoria_1'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
            if($evento->categoria_id == "2")  //si la tabla evento en la categoria 2
            {
                $eventos_formateados['eventos_categoria_2'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
            if($evento->categoria_id == "3")  //si la tabla evento en la categoria 3
            {
                $eventos_formateados['eventos_categoria_3'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
            if($evento->categoria_id == "4")  //si la tabla evento en la categoria 4
            {
                $eventos_formateados['eventos_categoria_4'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
            if($evento->categoria_id == "5")  //si la tabla evento en la categoria 5
            {
                $eventos_formateados['eventos_categoria_5'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
            if($evento->categoria_id == "6")  //si la tabla evento en la categoria 6
            {
                $eventos_formateados['eventos_categoria_6'][] = $evento;   // mostrar por categoria (fiesta patronales)
            }
        } 



        $router->render('paginas/eventos', [
            'titulo' => 'Eventos',
            'eventos' => $eventos_formateados // mandamos a llamar a la info
        ]);
    }
// Controlador de Marcar error
    public static function error(Router $router) {

        $router->render('paginas/error', [
            'titulo' => 'Página no encontrada'
        ]);
    }
}