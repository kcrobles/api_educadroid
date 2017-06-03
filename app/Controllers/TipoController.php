<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Tipo;

class TipoController extends Controller {

	public function create(Request $request, Response $response)
	{
		$tipo = new Tipo;
		$tipo->nombre = ucwords(strtolower($request->getParam('nombre')));
		$tipo->save();
		return $response->withJson($tipo, 201);
	}

	public function all(Request $request, Response $response)
	{
		$tipos = Tipo::all();
		return $response->withJson($tipos, 201);
	}

	public function update(Request $request, Response $response)
	{
		$tipo = null;
		try {			
			$tipo = Tipo::findOrFail($request->getAttribute('id'));
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de tipo de formato no encontrado"], 404);
		}
		$tipo->nombre = ($request->getParam('nombre') != null) ? ucwords(strtolower($request->getParam('nombre'))) : $tipo->nombre;
		$tipo->save();
		return $response->withJson(["message" => "Se actualizó el registro"], 200);
	}

	public function delete(Request $request, Response $response)
	{
		$tipo = null;
		try {
			$tipo = Tipo::findOrFail($request->getAttribute('id'));
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de tipo de formato no encontrado"], 404);
		}
		$tipo->delete();
		return $response->withJson(["message" => "Se eliminó el registro"], 200);
	}
}