<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

use Backend\MyApi\Create\Create;
use Backend\MyApi\Read\Read;
use Backend\MyApi\Update\Update;
use Backend\MyApi\Delete\Delete;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath("/tecweb/practicas/p13"); // Ajusta según tu ruta local

// Obtener un producto por ID
$app->get('/product/{id}', function (Request $request, Response $response, $args) {
    $productos = new Read('marketzone');
    $productos->single($args['id']);
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

// Listar todos los productos
$app->get('/products', function (Request $request, Response $response) {
    $productos = new Read('marketzone');
    $productos->list();
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

// Buscar productos
$app->get('/products/{search}', function (Request $request, Response $response, $args) {
    $productos = new Read('marketzone');
    $productos->search($args['search']);
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

// Agregar un producto
$app->post('/product', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $productos = new Create('marketzone');
    $productos->add((object)$data);
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

// Editar un producto
$app->put('/product', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $productos = new Update('marketzone');
    $productos->edit((object)$data);
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

// Eliminar un producto
$app->delete('/product', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $productos = new Delete('marketzone');
    $productos->delete($data['id']);
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
