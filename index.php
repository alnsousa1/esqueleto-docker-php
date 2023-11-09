<?php

use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Unialfa\Controllers\ClienteController;

require_once "vendor/autoload.php";

$app = AppFactory::create();

$app->group('/api', function(RouteCollectorProxy $group){
    $group->get('/clientes', [ClienteController::class, 'getClientes']);
    $group->post('/clientes', [ClienteController::class, 'postCliente']);
});


$app->run();
