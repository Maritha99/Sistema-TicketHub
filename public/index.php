<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\APIEventos;
use Controllers\APIOrganizadores;
use Controllers\AuthController;
use Controllers\EventosController;
use Controllers\PaginasController;
use Controllers\OrganizadorController;
use Controllers\RegistroController;
use Controllers\DashboardController;
use Controllers\RegistradosController;

$router = new Router();


// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);

// Area de administración
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

// Ponentes-Organizadores
$router->get('/admin/organizadores', [OrganizadorController::class, 'index']);

$router->get('/admin/organizadores/crear', [OrganizadorController::class, 'crear']);
$router->post('/admin/organizadores/crear', [OrganizadorController::class, 'crear']);

$router->get('/admin/organizadores/editar', [OrganizadorController::class, 'editar']);
$router->post('/admin/organizadores/editar', [OrganizadorController::class, 'editar']);

$router->post('/admin/organizadores/eliminar', [OrganizadorController::class, 'eliminar']);

//eventos
$router->get('/admin/eventos', [EventosController::class, 'index']);

$router->get('/admin/eventos/crear', [EventosController::class, 'crear']);
$router->post('/admin/eventos/crear', [EventosController::class, 'crear']);

$router->get('/admin/eventos/editar', [EventosController::class, 'editar']);
$router->post('/admin/eventos/editar', [EventosController::class, 'editar']);

$router->post('/admin/eventos/eliminar', [EventosController::class, 'eliminar']);

$router->get('/api/eventos-horario', [APIEventos::class, 'index']);
$router->get('/api/ponentes', [APIOrganizadores::class, 'index']);
$router->get('/api/ponente', [APIOrganizadores::class, 'ponente']);


$router->get('/admin/registrados', [RegistradosController::class, 'index']);



// Registro de Usuarios
$router->get('/finalizar-registro', [RegistroController::class, 'crear']);
$router->post('/finalizar-registro/gratis', [RegistroController::class, 'gratis']);
$router->post('/finalizar-registro/pagar', [RegistroController::class, 'pagar']);
$router->get('/finalizar-registro/conferencias', [RegistroController::class, 'conferencias']);
$router->post('/finalizar-registro/conferencias', [RegistroController::class, 'conferencias']);

// Boleto virtual
$router->get('/boleto', [RegistroController::class, 'boleto']);

// Área Pública  sitios web 
$router->get('/', [PaginasController::class, 'index']);
$router->get('/sobrenosotros', [PaginasController::class, 'nosotros']);  
$router->get('/organizadores', [PaginasController::class, 'organizadores']);
$router->get('/eventos', [PaginasController::class, 'eventos']); //Aqui va eventos 
$router->get('/404', [PaginasController::class, 'error']);

$router->comprobarRutas();