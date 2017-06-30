<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Controllers;
use \DavidePastore\Slim\Validation\Validation as Validacion;

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('Quién te conoce papá?');
    return $response;
});

$app->get('/images/{image}', '\App\Controllers\ImageController:getImageUploaded');

/* Users */

$app->get('/users', '\App\Controllers\UserController:all');

$app->get('/users/{id:[1-9]+[0-9]*}', '\App\Controllers\UserController:show');

$app->post('/users', '\App\Controllers\UserController:create');

$app->put('/users/{id:[1-9]+[0-9]*}', '\App\Controllers\UserController:update');

$app->delete('/users/{id:[1-9]+[0-9]*}', '\App\Controllers\UserController:delete');

/* Authentication */

$app->post('/auth/attempt', '\App\Controllers\Auth\AuthController:attempt')
	->add(new Validacion($LOGIN_VALIDATORS, $translator));

$app->post('/login', '\App\Controllers\Auth\AuthController:login');

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
$app->get('/encuestas/{id:[1-9]+[0-9]*}', '\App\Controllers\EncuestaController:find');
$app->put('/encuestas/{id:[1-9]+[0-9]*}', '\App\Controllers\EncuestaController:update');
$app->delete('/encuestas/{id:[1-9]+[0-9]*}', '\App\Controllers\EncuestaController:delete');

/*Deploy Encuestas*/
$app->post('/encuestas/deploy', '\App\Controllers\CursoEncuestaController:create');
$app->delete('/encuestas/deploy/{id:[1-9]+[0-9]*}', '\App\Controllers\CursoEncuestaController:delete');
$app->get('/encuestas/deploy', '\App\Controllers\CursoEncuestaController:all');

/* Tipos de Formato de Preguntas */
$app->post('/tipos', '\App\Controllers\TipoController:create');
$app->get('/tipos', '\App\Controllers\TipoController:all');
$app->put('/tipos/{id:[1-9]+[0-9]*}', '\App\Controllers\TipoController:update');
$app->delete('/tipos/{id:[1-9]+[0-9]*}', '\App\Controllers\TipoController:delete');

/* Preguntas */
$app->post('/preguntas', '\App\Controllers\PreguntaController:create');
$app->get('/preguntas', '\App\Controllers\PreguntaController:all');
$app->put('/preguntas/{id:[1-9]+[0-9]*}', '\App\Controllers\PreguntaController:update');
$app->delete('/preguntas/{id:[1-9]+[0-9]*}', '\App\Controllers\PreguntaController:delete');

/* Resultados */
$app->post('/resultados', '\App\Controllers\ResultadosController:create');
$app->get('/resultados', '\App\Controllers\ResultadosController:all');
$app->get('/resultados/find', '\App\Controllers\ResultadosController:findByEncuestaAndUser');
