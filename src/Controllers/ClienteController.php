<?php

namespace Unialfa\Controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ClienteController
{
    public function getClientes(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        //pode ser buscada do banco de dados
        $clientes = [
            ['id' => 1, 'nome' => 'Midras 1'],
            ['id' => 2, 'nome' => 'Midras 2'],
            ['id' => 3, 'nome' => 'Midras 3'],
        ];
        //escrevendo dentro do getBody() o conteúdo da variável $clientes, mas em formado de json
        $response->getBody()->write(json_encode($clientes));
        return $response->withHeader('Content-type', 'application/json');
    }

    public function postCliente(ServerRequestInterface $request, ResponseInterface $response, $args){
        $data = $request->getBody()->getContents();

        $responseBody = [
            'message' => "Cliente cadastrado com sucesso!",
            'data' => json_decode($data)
        ];

        $response->getBody()->write(json_encode($responseBody));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
}
