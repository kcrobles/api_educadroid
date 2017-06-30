<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Opcion;
use App\Models\Pregunta;

class OpcionController extends Controller {

	public function create(Request $request, Response $response)
	{
		/* texto, pregunta_id */
		$opcion = new Opcion;
		$opcion->pregunta_id = $request->getParam('pregunta_id');
		$opcion->texto = ucfirst(strtolower($request->getParam('texto')));
		$opcion->save();
		return $response->withJson($opcion, 201);
	}

	public function all(Request $request, Response $response)
	{
		$opciones = Opcion::all();
		return $response->withJson($opcions, 201);
	}

	public function update(Request $request, Response $response)
	{
		$opcion = null;
		$id = $request->getAttribute('id');
		try {
			$opcion = Opcion::where('id', $id)->firstOrFail($id);			
		} catch(ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de opcion no encontrado"], 404);
		}
		$opcion->texto = ($request->getParam('texto') != null) ? ucfirst(strtolower($request->getParam('texto'))) : $opcion->texto;
		$opcion->save();
		return $response->withJson(["message" => "Se actualizó el registro"], 200);
	}

	public function delete(Request $request, Response $response)
	{
		$opcion = null;
		$id = $request->getAttribute('id');
		try {
			$opcion = Opcion::where('id', $id)->firstOrFail($id);
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de opcion no encontrado"], 404);
		}
		$opcion->delete();
		return $response->withJson(["message" => "Se eliminó el registro"], 200);
	}
}