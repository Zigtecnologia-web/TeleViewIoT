<?php

// CORS ///////////////////////////////////////////
//header("Access-Control-Allow-Origin: " . $_ENV['FRONT_END_URL']);
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

require_once(__DIR__ . '/vendor/autoload.php');

// Log traits //////////////////////////////////////
use App\Traits\Log;
$logger = new Log();

// Dotenv //////////////////////////////////////
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Eloquent Connection ///////////////////////////
require_once(__DIR__ . '/System/Database/EloquentConnection.php');

// Default timezone /////////////////////////
date_default_timezone_set('UTC');

// Route class ///////////////////////////////////
use System\Route\GetRoute;
use System\Route\SelectController;

// Load controllers //////////////////////////////
$route = new SelectController(new GetRoute);

// Load routes //////////////////////////////////
require_once(__DIR__ . '/routes/routes.php');
