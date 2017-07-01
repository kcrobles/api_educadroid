<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\CursoEncuesta;

class CursoEncuestaController extends Controller {

	public function create(Request $request, Response $response)
	{

		CursoEncuesta::where('encuesta_id', $request->getParam('encuesta_id'))->delete();

		sleep(2);

		foreach ($request->getParam('curso_id_array') as $curso) {
			$cursoEncuesta = new CursoEncuesta();
			$cursoEncuesta->curso_id = $curso;
			$cursoEncuesta->encuesta_id = $request->getParam('encuesta_id');
			$cursoEncuesta->save();
		}

		return $response->withJson($request->getParam('curso_id_array'), 200);
	}

	public function all(Request $request, Response $response)
	{
		$cursoEncuestas = CursoEncuesta::all();
		return $response->withJson($cursoEncuestas, 201);
	}

	public function delete(Request $request, Response $response)
	{
		$cursoEncuesta = null;
		try {
			$cursoEncuesta = CursoEncuesta::findOrFail($request->getAttribute('id'));
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Rol no encontrado"], 404);
		}
		$cursoEncuesta->delete();
		return $response->withJson(["message" => "Se eliminó el registro"], 200);
	}
}
