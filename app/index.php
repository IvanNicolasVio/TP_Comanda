<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/hello/{name}', function ($request, $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("¡Funciona, $name!");
    return $response;
});

$app->post('/libros', function ($request, $response, $args) {
    $response->getBody()->write("¡Esto es un libro!");
    return $response;
});

$app->run();