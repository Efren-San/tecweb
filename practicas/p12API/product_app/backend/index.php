<?php
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// Habilitar CORS para permitir solicitudes del frontend (AJAX)
$app->add(function (Request $request, RequestHandlerInterface $handler): Response {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// Rutas

// Obtener lista de productos
$app->get('/backend/products', function (Request $request, Response $response) {
    $productos = new \Backend\MyApi\Read\Read('marketzone');
    $productos->list();
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

// Buscar productos por texto
$app->get('/backend/products/{search}', function (Request $request, Response $response, array $args) {
    $productos = new \Backend\MyApi\Read\Read('marketzone');
    $productos->search($args['search']);
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

// Obtener un producto por ID
$app->get('/backend/product/{id}', function (Request $request, Response $response, array $args) {
    $productos = new \Backend\MyApi\Read\Read('marketzone');
    $productos->single($args['id']);
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

// Agregar nuevo producto
$app->post('/backend/product', function (Request $request, Response $response) {
    $params = $request->getParsedBody();
    $productos = new \Backend\MyApi\Create\Create('marketzone');
    $productos->add((object)$params);
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

// Editar producto
$app->put('/backend/product', function (Request $request, Response $response) {
    $params = $request->getParsedBody();
    $productos = new \Backend\MyApi\Update\Update('marketzone');
    $productos->edit((object)$params);
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

// Eliminar producto
$app->delete('/backend/product', function (Request $request, Response $response) {
    $params = $request->getParsedBody();
    $productos = new \Backend\MyApi\Delete\Delete('marketzone');
    $productos->delete($params['id']);
    $response->getBody()->write($productos->getData());
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
