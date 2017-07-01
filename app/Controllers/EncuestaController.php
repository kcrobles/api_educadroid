<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Encuesta;
use App\Models\Pregunta;
use App\Models\Opcion;
use App\Models\Respuesta;
use App\Models\CursoEncuesta;
use App\Models\User;

class EncuestaController extends Controller {

	public function create(Request $request, Response $response)
	{
		$encuesta = new Encuesta;
		$encuesta->tema = $request->getParam('tema');
		$encuesta->save();
		foreach ($request->getParam('preguntas') as $auxPregunta) {
			$pregunta = new Pregunta;
			$pregunta->texto = $auxPregunta['consigna'];
			$pregunta->tipo_id = $auxPregunta['tipo'];
			$pregunta->encuesta_id = $encuesta->id;
			$pregunta->save();

			/*en este array guardo los ids de las opciones temporalmente para asosciar las respuestas*/
			$arrayOpciones = array();

			foreach ($auxPregunta['opciones'] as $auxOpcion) {
				$opcion = new Opcion;
				$opcion->texto = $auxOpcion;
				$opcion->pregunta_id = $pregunta->id;
				$opcion->save();
				$arrayOpciones[] = $opcion->id;
			}

			foreach ($auxPregunta['respuestas'] as $auxRespuesta) {
				$respuesta = new Respuesta;
				$respuesta->pregunta_id = $pregunta->id;
				$respuesta->opcion_id = $arrayOpciones[intval($auxRespuesta) - 1];
				$respuesta->save();
			}
		}

		return $response->withJson($encuesta, 201);
	}

	public function all(Request $request, Response $response)
	{
		$encuestas = Encuesta::with('preguntas')->get();
		return $response->withJson($encuestas, 201);
	}

	public function getByUser(Request $request, Response $response){
		$user=User::findOrFail($request->getAttribute('id'));

		//Profesor
		if($user->rol_id==2){


		//Alumno
		} else if ($user->rol_id==3){
			$legajo = Legajo::where('user_id',$user->id)->first();
		}

		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de encuesta no encontrado"], 404);
		}

		return $response->withJson($legajo, 201);
	}

	public function find(Request $request, Response $response)
	{
		try {
			$encuesta = Encuesta::where('id',$request->getAttribute('id'))->with('preguntas.opciones', 'preguntas.respuestas')->firstOrFail();
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de encuesta no encontrado"], 404);
		}
		return $response->withJson($encuesta, 201);
	}

	public function update(Request $request, Response $response)
	{
		$encuesta = null;
		$id = $request->getAttribute('id');
		try {
			$encuesta = Encuesta::where('id', $id)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de encuesta no encontrado"], 404);
		}
		$encuesta->tema = ($request->getParam('tema') != null) ? ucwords(strtolower($request->getParam('tema'))) : $encuesta->tema;
		$encuesta->save();
		return $response->withJson(["message" => "Se actualizó el registro"], 200);
	}

	public function delete(Request $request, Response $response)
	{
		$encuesta = null;
		$id = $request->getAttribute('id');
		try {
			$encuesta = Encuesta::where('id', $id)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de encuesta no encontrado"], 404);
		}
		$encuesta->delete();
		return $response->withJson(["message" => "Se eliminó el registro"], 200);
	}
}
