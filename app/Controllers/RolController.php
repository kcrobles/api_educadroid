<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Rol;

class RolController extends Controller {

	public function create(Request $request, Response $response)
	{
		$role = new Rol;
		$role->nombre = ucwords(strtolower($request->getParam('nombre')));
		$role->save();
		return $response->withJson($role, 201);
	}

	public function all(Request $request, Response $response)
	{
		$roles = Rol::all();
		return $response->withJson($roles, 201);
	}

	public function update(Request $request, Response $response)
	{
		$role = null;
		try {			
			$role = Rol::findOrFail($request->getAttribute('id'));
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Rol no encontrado"], 404);
		}
		$role->nombre = ($request->getParam('nombre') != null) ? ucwords(strtolower($request->getParam('nombre'))) : $role->nombre;
		$role->save();
		return $response->withJson(["message" => "Se actualizó el registro"], 200);
	}

	public function delete(Request $request, Response $response)
	{
		$role = null;
		try {
			$role = Rol::findOrFail($request->getAttribute('id'));
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Rol no encontrado"], 404);
		}
		$role->delete();
		return $response->withJson(["message" => "Se eliminó el registro"], 200);
	}
}