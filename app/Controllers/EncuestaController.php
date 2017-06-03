<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Encuesta;

class EncuestaController extends Controller {

	public function create(Request $request, Response $response)
	{
		$encuesta = new Encuesta;
		$encuesta->tema = ucwords(strtolower($request->getParam('tema')));
		$encuesta->save();
		return $response->withJson($encuesta, 201);
	}

	public function all(Request $request, Response $response)
	{
		$encuestas = Encuesta::all();
		return $response->withJson($encuestas, 201);
	}

	public function update(Request $request, Response $response)
	{
		$encuesta = null;
		try {			
			$encuesta = Encuesta::findOrFail($request->getAttribute('id'));
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
		try {
			$encuesta = Encuesta::findOrFail($request->getAttribute('id'));
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de encuesta no encontrado"], 404);
		}
		$encuesta->delete();
		return $response->withJson(["message" => "Se eliminó el registro"], 200);
	}
}