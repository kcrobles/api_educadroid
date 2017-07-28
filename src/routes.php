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
/**
 * @api {post} /encuestas Alta de cuestionarios
 * @apiName create
 * @apiGroup Cuestionarios
 * @apiParam {string} tema Tema del cuestionario
 * @apiParam {Object[]} preguntas Array de preguntas
 * @apiParam {Number} user_id ID de usuario creador del cuestionario
 * @apiSuccess {Object} cuestionario Devuelve un json con los datos del cuestionario creado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->post('/encuestas', '\App\Controllers\EncuestaController:create');

/**
 * @api {get} /encuestas Listado de cuestionarios
 * @apiName all
 * @apiGroup Cuestionarios
 * @apiSuccess {Object[]} cuestionarios Devuelve un json con los cuestionarios registrados en la base de datos
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/encuestas', '\App\Controllers\EncuestaController:all');

/**
 * @api {get} /encuestas/user/:id Listado de cuestionarios por usuario
 * @apiName getByUser
 * @apiGroup Cuestionarios
 * @apiParam {Number} id ID del usuario creador
 * @apiSuccess {Object[]} cuestionarios Devuelve un json con los cuestionarios del usuario
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/encuestas/user/{id:[1-9]+[0-9]*}', '\App\Controllers\EncuestaController:getByUser');

/**
 * @api {get} /encuestas/:id Mostrar cuestionario
 * @apiName find
 * @apiGroup Cuestionarios
 * @apiParam {Number} id ID del cuestionario
 * @apiSuccess {Object} cuestionario Devuelve un json con los datos del cuestionario
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/encuestas/{id:[1-9]+[0-9]*}', '\App\Controllers\EncuestaController:find');

/**
 * @api {put} /encuestas/:id Modificar cuestionario
 * @apiName update
 * @apiGroup Cuestionarios
 * @apiParam {Number} id ID del cuestionario
 * @apiParam {Object[]} preguntas Array de preguntas del cuestionario
 * @apiSuccess {Object} cuestionario Devuelve un json con los datos del cuestionario
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->put('/encuestas/{id:[1-9]+[0-9]*}', '\App\Controllers\EncuestaController:update');

/**
 * @api {delete} /encuestas/:id Baja de cuestionario
 * @apiName delete
 * @apiGroup Cuestionarios
 * @apiParam {Number} id ID del cuestionario
 * @apiSuccess {Object} cuestionario Devuelve un json con los datos del cuestionario eliminado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->delete('/encuestas/{id:[1-9]+[0-9]*}', '\App\Controllers\EncuestaController:delete');

/*Deploy Encuestas*/
$app->post('/encuestas/deploy', '\App\Controllers\CursoEncuestaController:create');
$app->delete('/encuestas/deploy/{id:[1-9]+[0-9]*}', '\App\Controllers\CursoEncuestaController:delete');
$app->get('/encuestas/deploy', '\App\Controllers\CursoEncuestaController:all');

/* Tipos de Formato de Preguntas */
/**
 * @api {post} /tipos Alta de tipos de pregunta
 * @apiName create
 * @apiGroup Tipos
 * @apiParam {string} nombre Nombre del tipo de pregunta
 * @apiSuccess {Object} tipo Devuelve un json con los datos del registro creado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->post('/tipos', '\App\Controllers\TipoController:create');

/**
 * @api {get} /tipos Listado de tipos de pregunta
 * @apiName all
 * @apiGroup Tipos
 * @apiSuccess {Object[]} tipos Devuelve un json con los datos del registros de tipos de pregunta
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/tipos', '\App\Controllers\TipoController:all');

/**
 * @api {put} /tipos/:id Modificar nombre de tipo de pregunta
 * @apiName update
 * @apiGroup Tipos
 * @apiParam {Number} id ID del registro
 * @apiParam {string} nombre Nombre del tipo de pregunta
 * @apiSuccess {Object} tipo Devuelve un json con los datos del registro actualizado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->put('/tipos/{id:[1-9]+[0-9]*}', '\App\Controllers\TipoController:update');

/**
 * @api {delete} /tipos/:id Elimina tipo de pregunta
 * @apiName delete
 * @apiGroup Tipos
 * @apiParam {Number} id ID del registro
 * @apiSuccess {Object} tipo Devuelve un json con los datos del registro actualizado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->delete('/tipos/{id:[1-9]+[0-9]*}', '\App\Controllers\TipoController:delete');

/* Preguntas */
/**
 * @api {post} /preguntas Alta de preguntas
 * @apiName create
 * @apiGroup Preguntas
 * @apiParam {string} consigna Texto de la pregunta
 * @apiParam {Number} tipo ID del tipo de pregunta
 * @apiParam {Number} cuestionario_id ID del cuestionario
 * @apiParam {Object[]} opciones Array con las opciones
 * @apiParam {Object[]} respuestas Array con la(s) respuesta(s)
 * @apiSuccess {Object} pregunta Devuelve un json con los datos del registro creado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->post('/preguntas', '\App\Controllers\PreguntaController:create');

/**
 * @api {get} /preguntas/:id Listado de preguntas
 * @apiName all
 * @apiGroup Preguntas
 * @apiSuccess {Object} tpreguntasipo Devuelve un json con los datos de los registros
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/preguntas', '\App\Controllers\PreguntaController:all');

/**
 * @api {get} /preguntas/:id Listado de preguntas
 * @apiName find
 * @apiGroup Preguntas
 * @apiParam {Number} id ID de la pregunta
 * @apiSuccess {Object} pregunta Devuelve un json con los datos del registro
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/preguntas/{id:[1-9]+[0-9]*}', '\App\Controllers\PreguntaController:find');

/**
 * @api {put} /preguntas/:id Modificar pregunta
 * @apiName update
 * @apiGroup Preguntas
 * @apiParam {Number} id ID de la pregunta
 * @apiParam {string} consigna Texto de la pregunta
 * @apiParam {Number} tipo ID del tipo de pregunta
 * @apiParam {Number} cuestionario_id ID del cuestionario
 * @apiParam {Object[]} opciones Array con las opciones
 * @apiParam {Object[]} respuestas Array con la(s) respuesta(s)
 * @apiSuccess {Object} pregunta Devuelve un json con los datos del registro actualizado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->put('/preguntas/{id:[1-9]+[0-9]*}', '\App\Controllers\PreguntaController:update');

/**
 * @api {delete} /preguntas/:id Baja de preguntas
 * @apiName delete
 * @apiGroup Preguntas
 * @apiParam {Number} id ID de la pregunta
 * @apiSuccess {Object} pregunta Devuelve un json con los datos del registro eliminado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->delete('/preguntas/{id:[1-9]+[0-9]*}', '\App\Controllers\PreguntaController:delete');


/* Resultados */
/**
 * @api {post} /resultados Alta de resultados
 * @apiName create
 * @apiGroup Resultados
 * @apiParam {Object[]} preguntas Array de preguntas
 * @apiSuccess {Object} resultado Devuelve un json con los datos del resultado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->post('/resultados', '\App\Controllers\ResultadosController:create');

/**
 * @api {get} /resultados Listado de resultados
 * @apiName all
 * @apiGroup Resultados
 * @apiSuccess {Object[]} resultados Devuelve un json con los datos de resultados
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/resultados', '\App\Controllers\ResultadosController:all');

/**
 * @api {get} /resultados/find Mostrar resultado de cuestionario
 * @apiName findByEncuestaAndUser
 * @apiGroup Resultados
 * @apiParam {Number} encuesta_id ID del cuestionario
 * @apiParam {Number} user_id ID del usuario
 * @apiSuccess {Object} resultado Devuelve un json con los datos del resultado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/resultados/find', '\App\Controllers\ResultadosController:findByEncuestaAndUser');

/* Materias */
/**
 * @api {post} /materias Alta de materias
 * @apiName create
 * @apiGroup Materias
 * @apiParam {string} nombre Nombre de la materia
 * @apiSuccess {Object} materia Devuelve un json con los datos del registro creado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->post('/materias', '\App\Controllers\MateriaController:create');

/**
 * @api {get} /materias Listado de materias
 * @apiName all
 * @apiGroup Materias 
 * @apiSuccess {Object[]} materias Devuelve un json con los registros de materias
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/materias', '\App\Controllers\MateriaController:all');

/**
 * @api {get} /materias/:id Mostrar materia
 * @apiName find
 * @apiGroup Materias 
 * @apiParam {Number} materia_id ID de la materia
 * @apiSuccess {Object} materia Devuelve un json con los registros de materias
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/materias/{id:[1-9]+[0-9]*}', '\App\Controllers\MateriaController:find');

/**
 * @api {delete} /materias Baja de materias
 * @apiName delete
 * @apiGroup Materias 
 * @apiParam {Number} materia_id ID de la materia
 * @apiSuccess {Object} materia Devuelve un json con los datos del registro eliminado
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->delete('/materias/{id:[1-9]+[0-9]*}', '\App\Controllers\MateriaController:delete');

/* Cursos */
/**
 * @api {get} /cursos Listado de cursos
 * @apiName all
 * @apiGroup Cursos
 * @apiSuccess {Object[]} cursos Devuelve un json con los registros de cursos
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/cursos', '\App\Controllers\CursoController:all');

/**
 * @api {get} /cursos/:id Listado de cursos por usuario
 * @apiName getByUser
 * @apiGroup Cursos
 * @apiParam {Number} id ID del usuario
 * @apiSuccess {Object[]} cursos Devuelve un json con los registros de cursos del usuario
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->get('/cursos/{id:[1-9]+[0-9]*}', '\App\Controllers\CursoController:getByUser');

/* Inscripciones */
/**
 * @api {post} /inscripciones Alta de inscripciones
 * @apiName getByUser
 * @apiGroup Inscripciones
 * @apiParam {Object[]} cursos Array de cursos
 * @apiParam {Number} legajo ID del usuario
 * @apiSuccess {Object[]} inscripcion Devuelve un json con los registros de inscripcion
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */
$app->post('/inscripciones', '\App\Controllers\InscripcionController:create');

/**
 * @api {delete} /inscripciones Baja de inscripciones
 * @apiName delete
 * @apiGroup Inscripciones
 * @apiParam {Object[]} cursos Array de cursos
 * @apiParam {Number} legajo ID del usuario
 * @apiSuccess {Object[]} inscripcion Devuelve un json con los registros de inscripcion actualizados
 * @apiError message 404 Informa del error específico.
 * @apiVersion 0.0.1
 */

/**
 * @api {get} /images/:nombre Retornar imagen
 * @apiName getImageUploaded
 * @apiParam {Number} nombre identificador único de la imagen subida al servidor.
 * @apiGroup Images
 * @apiSuccess {Object} imagen Retorna un archivo de imagen subida al servidor.
 * @apiVersion 0.0.1
 */
$app->get('/images/{image}', '\App\Controllers\ImageController:getImageUploaded');

/**
 * @api {post} /images Subir imagen al servidor
 * @apiName uploadUserPhoto
 * @apiParam {Number} user_id ID del usuario
 * @apiParam {Object} image Imagen
 * @apiGroup Images
 * @apiSuccess {string} message Mensaje de estatus de la petición
 * @apiVersion 0.0.1
 */
$app->post('/images', '\App\Controllers\ImageController:uploadUserPhoto');