<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;

require_once "vendor/autoload.php";

$app = AppFactory::create();

$app->get('/clientes', function (ServerRequestInterface $request, ResponseInterface $response, $args) {
    //pode ser buscada do banco de dados
    $clientes = [
        ['id' => 1, 'nome' => 'Midras 1'],
        ['id' => 2, 'nome' => 'Midras 2'],
        ['id' => 3, 'nome' => 'Midras 3'],
    ];
    //escrevendo dentro do getBody() o conteúdo da variável $clientes, mas em formado de json
    $response->getBody()->write(json_encode($clientes));
    return $response->withHeader('Content-type', 'application/json');
});

$app->run();
