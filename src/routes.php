<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Controllers;
use \DavidePastore\Slim\Validation\Validation as Validacion;

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('Quién te conoce papá?');
    return $response;
});

/* Users */

$app->get('/users', '\App\Controllers\UserController:all');

$app->get('/users/{id:[1-9]+[0-9]*}', '\App\Controllers\UserController:show');

$app->post('/users', '\App\Controllers\UserController:create')
	->add(new Validacion($USER_CREATE, $translator));

$app->put('/users/{id:[1-9]+[0-9]*}', '\App\Controllers\UserController:update')
	->add(new Validacion($USER_EDIT, $translator));

$app->delete('/users/{id:[1-9]+[0-9]*}', '\App\Controllers\UserController:delete');

/* Authentication */

$app->post('/auth/attempt', '\App\Controllers\Auth\AuthController:attempt')
	->add(new Validacion($LOGIN_VALIDATORS, $translator));

$app->post('/login', '\App\Controllers\Auth\AuthController:login')
	->add(new Validacion($LOGIN_VALIDATORS, $translator));
$app->post('/verify', '\App\Controllers\Auth\AuthController:verify');

/* Roles */
$app->post('/roles', '\App\Controllers\RolController:create');
$app->get('/roles', '\App\Controllers\RolController:all');
$app->put('/roles/{id:[1-9]+[0-9]*}', '\App\Controllers\RolController:update');
$app->delete('/roles/{id:[1-9]+[0-9]*}', '\App\Controllers\RolController:delete');

/* Domicilios */ 
$app->post('/domicilios', '\App\Controllers\DomicilioController:create');
$app->get('/domicilios', '\App\Controllers\DomicilioController:all');
$app->put('/domicilios/{id:[1-9]+[0-9]*}', '\App\Controllers\DomicilioController:update');
$app->delete('/domicilios/{id:[1-9]+[0-9]*}', '\App\Controllers\DomicilioController:delete');

/* Encuestas */ 
$app->post('/encuestas', '\App\Controllers\EncuestaController:create');
$app->get('/encuestas', '\App\Controllers\EncuestaController:all');
$app->put('/encuestas/{id:[1-9]+[0-9]*}', '\App\Controllers\EncuestaController:update');
$app->delete('/encuestas/{id:[1-9]+[0-9]*}', '\App\Controllers\EncuestaController:delete');