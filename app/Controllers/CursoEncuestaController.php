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
		$cursoEncuesta = new CursoEncuesta;
		$cursoEncuesta->encuesta_id = $request->getParam('encuesta_id');
		$cursoEncuesta->curso_id = $request->getParam('curso_id');
		$cursoEncuesta->save();
		return $response->withJson($cursoEncuesta, 201);
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
