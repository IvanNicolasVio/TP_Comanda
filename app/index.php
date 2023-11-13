<?php
error_reporting(-1);
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . './Clases/Usuario.php';

use Slim\Factory\AppFactory;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$app = AppFactory::create();

$app->get('/hello/{name}', function ($request, $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("¡Funciona, $name!");
    return $response;
});

$app->post('/usuario/crear', function ($request, $response, $args) {
    $nombre = $args['nombre'];
    $tipo = $args['tipo'];
    $dni = $args['dni'];
    $nuevoUsuario = new Usuario($nombre,$tipo,$dni);
    $id = $nuevoUsuario->crearUsuario();
    $response->getBody()->write("¡Esto es un empleado!");
    return $response;
});

$app->run();