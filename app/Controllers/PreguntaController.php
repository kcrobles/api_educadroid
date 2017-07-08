<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Pregunta;
use App\Models\Tipo;
use App\Models\Encuesta;

class PreguntaController extends Controller {

	public function create(Request $request, Response $response)
	{
		$auxPregunta = $request->getParam('pregunta');
		$pregunta = new Pregunta;
		$pregunta->texto = $auxPregunta['consigna'];
		$pregunta->tipo_id = $auxPregunta['tipo'];
		$pregunta->encuesta_id = $request->getParam('encuesta_id');
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
		return $response->withJson($pregunta, 201);
	}

	public function all(Request $request, Response $response)
	{
		$preguntas = Pregunta::all();
		return $response->withJson($preguntas, 201);
	}

	public function find(Request $request, Response $response)
	{
		$id = $request->getAttribute('id');
		$pregunta = Pregunta::find($id)->with('opciones', 'respuestas')->firstOrFail();
		return $response->withJson($pregunta, 201);
	}

	public function update(Request $request, Response $response)
	{
		$pregunta = null;
		$id = $request->getAttribute('id');
		try {
			$pregunta = Pregunta::where('id', $id)->firstOrFail($id);
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de pregunta no encontrado"], 404);
		}
		try {
			$tipo = Tipo::where('id', $request->getParam('tipo_id'))->firstOrFail();
			$tipo->preguntas()->save($pregunta);
		} catch(ModelNotFoundException $e) {
			return $response->withJson(["message" => "Formato de pregunta no encontrado"], 404);
		}
		try {
			$encuesta = Encuesta::where('id', $request->getParam('encuesta_id'))->firstOrFail();
			$encuesta->preguntas()->save($pregunta);
		} catch(ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de encuesta no encontrado"], 404);
		}
		$pregunta->texto = ($request->getParam('texto') != null) ? ucfirst(strtolower($request->getParam('texto'))) : $pregunta->texto;
		$pregunta->save();
		return $response->withJson(["message" => "Se actualizó el registro"], 200);
	}

	public function delete(Request $request, Response $response)
	{
		$id = $request->getAttribute('id');
		try {
			Opcion::where('pregunta_id',$id)->delete();
			Respuesta::where('pregunta_id',$id)->delete();
			Resultado::where('pregunta_id',$id)->delete();
			Pregunta::where('encuesta_id', $id)->delete();
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de pregunta no encontrado"], 404);
		}
		return $response->withJson(["message" => "Se eliminó el registro"], 200);
	}
}
