<?php
# $route->post("login", 'Api\LoginController@login');
# $route->post("login/token", 'Api\LoginController@loginWithToken');

$route->get("users", 'Api\UserController@index');
$route->get("telemetry", 'Api\TelemetryController@store');

$route->run();
