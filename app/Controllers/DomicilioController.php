<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Domicilio;

class RolController extends Controller {

	public function create(Request $request, Response $response)
	{
		$domicilio = new Domicilio;
		$domicilio->direccion = ucwords(strtolower($request->getParam('direccion')));
		$domicilio->latitud = $request->getParam('latitud');
		$domicilio->longitud = $request->getParam('longitud');
		$domicilio->save();
		return $response->withJson($domicilio, 201);
	}

	public function all(Request $request, Response $response)
	{
		$domicilios = Domicilio::all();
		return $response->withJson($domicilios, 201);
	}

	public function update(Request $request, Response $response)
	{
		$domicilio = null;
		$id = $request->getAttribute('id');
		try {			
			$domicilio = Domicilio::where('id', $id)->firstOrFail($id);
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de domicilio no encontrado"], 404);
		}
		$domicilio->direccion = ($request->getParam('direccion') != null) ? ucwords(strtolower($request->getParam('direccion'))) : $domicilio->direccion;
		$domicilio->latitud = ($request->getParam('latitud') != null) ? $request->getParam('latitud') : $domicilio->latitud;
		$domicilio->longitud = ($request->getParam('longitud') != null ? $request->getParam('longitud') : $domicilio->longitud;
		$domicilio->save();
		return $response->withJson(["message" => "Se actualizó el registro"], 200);
	}

	public function delete(Request $request, Response $response)
	{
		$domicilio = null;
		$id = $request->getAttribute('id');
		try {
			$domicilio = Domicilio::fwhere('id', $id)->firstOrFail($id);
		} catch (ModelNotFoundException $e) {
			return $response->withJson(["message" => "Registro de domicilio no encontrado"], 404);
		}
		$domicilio->delete();
		return $response->withJson(["message" => "Se eliminó el registro"], 200);
	}
}