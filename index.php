<?php

use App\Traits\Log;
use Dotenv\Dotenv;
use System\Route\GetRoute;
use System\Route\SelectController;

try {
    // CORS ///////////////////////////////////////////
    //header("Access-Control-Allow-Origin: " . $_ENV['FRONT_END_URL']);
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    require_once(__DIR__ . '/vendor/autoload.php');

    // Log traits //////////////////////////////////////
    $logger = new Log();

    // Dotenv //////////////////////////////////////
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Eloquent Connection ///////////////////////////
    require_once(__DIR__ . '/System/Database/EloquentConnection.php');

    // Default timezone /////////////////////////
    date_default_timezone_set('UTC');

    // Route class ///////////////////////////////////
    $route = new SelectController(new GetRoute);

    // Load routes //////////////////////////////////
    require_once(__DIR__ . '/routes/routes.php');

} catch (InvalidArgumentException $e) {
    http_response_code(400);
    echo json_encode([
        'error' => true,
        'message' => $e->getMessage(),
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'error' => true,
        'message' => 'Erro interno no servidor.',
        'details' => $e->getMessage(),
        'file' => $e->getFile(),
        'line' => $e->getLine(),
    ]);
}
