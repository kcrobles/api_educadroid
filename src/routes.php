<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \App\Controllers;
use \DavidePastore\Slim\Validation\Validation as Validacion;

/**
 * @api {get} / Ruta raiz de la API
 * @apiName Home
 * @apiGroup Home
 * @apiSuccess {string} message Devuelve el nombre de la API en caso de haberse instalado y configurado con éxito.
 */

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('API Educadroid');
    return $response;
});

/* Users */

/**
 * @api {get} /users Listado de usuarios
 * @apiName all
 * @apiGroup Users
 * @apiSuccess {Object[]} users Devuelve un json con los usuarios registrados en la base de datos
 * @apiError message 404 Informa que no hay usuarios registrados.
 * @apiVersion 0.0.1
 */
$app->get('/users', '\App\Controllers\UserController:all');

/**
 * @api {post} /users Alta de usuarios
 * @apiName create
 * @apiGroup Users
 * @apiParam {string} nombre  Nombre del usuario.
 * @apiParam {string} apellido Apellido del usuario
 * @apiParam {string} email Email del usuario
 * @apiParam {string {6..12} } password Password del usuario
 * @apiParam {string {7..8} } documento Nro de documento del usuario
 * @apiParam {Date} fnacimiento Fecha de nacimiento del usuario
 * @apiParam {string} sexo="m" Sexo
 * @apiParam {string} domicilio Dirección del usuario
 * @apiParam {string} [latitud] Coordenada latitudinal de la ubicación del usuario
 * @apiParam {string} [longitud] Coordenada longitudinal de la ubicación del usuario
 * @apiSuccess {Object} user Devuelve un json con los datos del alta
 * @apiError message Informa el tipo de error (validación, repetido, parámetros, etc) en el mensaje.
 * @apiVersion 0.0.1
 */
$app->post('/users', '\App\Controllers\UserController:create');

/**
 * @api {get} /users/:id Mostrar usuario.
 * @apiName show
 * @apiGroup Users
 * @apiParam {Number} id  ID del usuario.
 * @apiSuccess {Object} user Devuelve un json con los datos del usuario encontrado.
 * @apiError message 404 El usuario no existe.
 * @apiVersion 0.0.1
 */
$app->get('/users/{id:[1-9]+[0-9]*}', '\App\Controllers\UserController:show');

/**
 * @api {put} /users/:id Modificar usuario
 * @apiName update
 * @apiGroup Users
 * @apiParam {Number} id  ID del usuario.
 * @apiParam {string} [nombre]  Nombre del usuario.
 * @apiParam {string} [apellido] Apellido del usuario
 * @apiParam {string} [email] Email del usuario
 * @apiParam {string {6..12} } [password] Password del usuario
 * @apiParam {string {7..8} } [documento] Nro de documento del usuario
 * @apiParam {Date} [fnacimiento] Fecha de nacimiento del usuario
 * @apiParam {string} [sexo] Sexo
 * @apiParam {string} [domicilio] Dirección del usuario
 * @apiParam {string} [latitud] Coordenada latitudinal de la ubicación del usuario
 * @apiParam {string} [longitud] Coordenada longitudinal de la ubicación del usuario
 * @apiSuccess {Object} user Devuelve un json con los datos actualizados del usuario
 * @apiError message Informa el tipo de error (validación, repetido, parámetros, etc) en el mensaje.
 * @apiVersion 0.0.1
 */
$app->put('/users/{id:[1-9]+[0-9]*}', '\App\Controllers\UserController:update');

/**
 * @api {delte} /users/:id Baja de usuario
 * @apiName delete
 * @apiGroup Users
 * @apiParam {Number} id  ID del usuario.
 * @apiSuccess {Object} user Devuelve un json con los datos del usuario eliminado.
 * @apiError message 404 El usuario no existe.
 * @apiVersion 0.0.1
 */
$app->delete('/users/{id:[1-9]+[0-9]*}', '\App\Controllers\UserController:delete');
$app->get('/users/rol/{id:[1-9]+}', '\App\Controllers\UserController:getUsersByRol');

/* Authentication */

/**
 * @api {post} /auth/attempt Login
 * @apiName attempt
 * @apiGroup Auth
 * @apiParam {string} email Email del usuario
 * @apiParam {string {6 .. 12} } password Password del usuario
 * @apiSuccess {Object} token Devuelve un JWT del usuario autenticado
 * @apiError message Informa el tipo de error (validación, repetido, contraseña, parámetros, etc) en el mensaje.
 * @apiVersion 0.0.1
 */
$app->post('/auth/attempt', '\App\Controllers\Auth\AuthController:attempt')
	->add(new Validacion($LOGIN_VALIDATORS, $translator));

/* Roles */
/**
 * @api {get} /roles Listado de roles
 * @apiName all
 * @apiGroup Roles
 * @apiSuccess {Object[]} roles Devuelve un json con los roles y sus usuarios.
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/roles', '\App\Controllers\RolController:all');

/**
 * @api {post} /roles Alta de roles
 * @apiName create
 * @apiGroup Roles
 * @apiParam {string} nombre Nombre del nuevo rol
 * @apiSuccess {Object} rol Devuelve un json con los datos del registro creado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->post('/roles', '\App\Controllers\RolController:create');

/**
 * @api {put} /roles/:id Modificar roles
 * @apiName update
 * @apiGroup Roles
 * @apiParam {Number} id ID del rol
 * @apiParam {string} nombre Nombre del rol
 * @apiSuccess {Object} rol Devuelve un json con los datos del registro actualizado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->put('/roles/{id:[1-9]+[0-9]*}', '\App\Controllers\RolController:update');

/**
 * @api {delete} /roles/:id Baja de roles
 * @apiName delete
 * @apiGroup Roles
 * @apiParam {Number} id ID del rol
 * @apiSuccess {Object} rol Devuelve un json con los datos del registro eliminado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->delete('/roles/{id:[1-9]+[0-9]*}', '\App\Controllers\RolController:delete');

/* Domicilios */
/**
 * @api {post} /domicilios Alta de domicilios
 * @apiName create
 * @apiGroup Domicilios
 * @apiParam {string} direccion Direccion del usuario
 * @apiParam {string} [latitud] Coordenada latitudinal de la ubicación del usuario
 * @apiParam {string} [longitud] Coordenada longitudinal de la ubicación del usuario
 * @apiSuccess {Object} domicilio Devuelve un json con los datos del registro creado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->post('/domicilios', '\App\Controllers\DomicilioController:create');

/**
 * @api {get} /domicilios Listado de domicilios
 * @apiName all
 * @apiGroup Domicilios
 * @apiSuccess {Object[]} domicilios Devuelve un json con los registros de domicilios
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/domicilios', '\App\Controllers\DomicilioController:all');

/**
 * @api {put} /domicilios/:id Modificar domicilio
 * @apiName update
 * @apiGroup Domicilios
 * @apiParam {number} id ID del registro de domicilio
 * @apiParam {string} [direccion] Direccion del usuario
 * @apiParam {string} [latitud] Coordenada latitudinal de la ubicación del usuario
 * @apiParam {string} [longitud] Coordenada longitudinal de la ubicación del usuario
 * @apiSuccess {Object} domicilio Devuelve un json con los datos del registro creado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->put('/domicilios/{id:[1-9]+[0-9]*}', '\App\Controllers\DomicilioController:update');

/**
 * @api {delete} /domicilios/:id Baja de domicilio
 * @apiName delete
 * @apiGroup Domicilios
 * @apiParam {number} id ID del registro de domicilio
 * @apiSuccess {Object} domicilio Devuelve un json con los datos del registro eliminado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->delete('/domicilios/{id:[1-9]+[0-9]*}', '\App\Controllers\DomicilioController:delete');

/* Encuestas */
$app->post('/encuestas', '\App\Controllers\EncuestaController:create');
$app->get('/encuestas', '\App\Controllers\EncuestaController:all');
$app->get('/encuestas/user/{id:[1-9]+[0-9]*}', '\App\Controllers\EncuestaController:getByUser');
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
$app->get('/preguntas/{id:[1-9]+[0-9]*}', '\App\Controllers\PreguntaController:find');
$app->put('/preguntas/{id:[1-9]+[0-9]*}', '\App\Controllers\PreguntaController:update');
$app->delete('/preguntas/{id:[1-9]+[0-9]*}', '\App\Controllers\PreguntaController:delete');


/* Resultados */
$app->post('/resultados', '\App\Controllers\ResultadosController:create');
$app->get('/resultados', '\App\Controllers\ResultadosController:all');
$app->get('/resultados/find', '\App\Controllers\ResultadosController:findByEncuestaAndUser');

/* Materias */
$app->post('/materias', '\App\Controllers\MateriaController:create');
$app->get('/materias', '\App\Controllers\MateriaController:all');
$app->get('/materias/{id:[1-9]+[0-9]*}', '\App\Controllers\MateriaController:find');
$app->delete('/materias/{id:[1-9]+[0-9]*}', '\App\Controllers\MateriaController:delete');

/* Cursos */
$app->get('/cursos', '\App\Controllers\CursoController:all');
$app->get('/cursos/{id:[1-9]+[0-9]*}', '\App\Controllers\CursoController:getByUser');

/* Inscripciones */
$app->post('/inscripciones', '\App\Controllers\InscripcionController:create');

/**
 * @api {get} /images/:nombre Retornar imagen
 * @apiName getImageUploaded
 * @apiParam {Number} nombre identificador único de la imagen subida al servidor.
 * @apiGroup Images
 * @apiSuccess {Object} imagen Retorna un archivo de imagen subida al servidor.
 * @apiVersion 0.0.1
 */
$app->get('/images/{image}', '\App\Controllers\ImageController:getImageUploaded');