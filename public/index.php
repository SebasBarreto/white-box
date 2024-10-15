<?php

require __DIR__.'/../vendor/autoload.php'; // Carga las dependencias de Composer

$app = require_once __DIR__.'/../bootstrap/app.php'; // Inicializa la aplicación

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class); // Crea el kernel HTTP

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture() // Captura la solicitud actual
);

$response->send(); // Envía la respuesta al navegador

$kernel->terminate($request, $response); // Finaliza la solicitud
