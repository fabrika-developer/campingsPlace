<?php

namespace App\Application\Fdt;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\RequestInterface as Request;

class MySelectDB
{
    

    public function getData(Response $response): Response
    {
        $test = "Hola Teste";
        $encoded = json_encode($test);
        $response->getBody()->write($encoded);
        return $response->withHeader('Content-Type', 'application/json');
    }

}