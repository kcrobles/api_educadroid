<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\User;
use App\Models\Domicilio;

class UserController extends Controller {

	public function show(Request $request, Response $response)
	{
		$id = $request->getAttribute('id');
		$user = null;
		try {
			$user = User::where('id', $id)->with('rol', 'domicilio')->firstOrFail();
		} catch (ModelNotFoundException $e) {
			$data = ["message" => "Usuario no encontrado."];
			return $response->withJson($data, 404);
		}
		return $response->withJson($user, 200);
	}

	public function all(Request $request, Response $response)
	{
		$users = User::with('rol', 'domicilio')->get();

		if(count($users) < 1)
		{
			return $response->withJson([
				"status" => "error",
				"message" => "No hay usuarios registrados"
			], 404);
		}

		return $response->withJson($users, 200);
	}

	public function delete(Request $request, Response $response)
	{
		$id = $request->getAttribute('id');
		$user = null;
		try {
			$user = User::where('id', $id)->firstOrFail($id);
		} catch (ModelNotFoundException $e) {
			$data = [
			"message" => "Usuario no encontrado"
			];
			return $response->withJson($data, 404);
		}
		$user->delete();
		$data = [
			"status" => "success",
			"message" => "El usuario ha sido eliminado"
		];
		return $response->withJson($data, 200);
	}

	public function create(Request $request, Response $response)
	{
		$user = new User;
		$user->nombre = ucwords(strtolower($request->getParam('nombre')));
		$user->apellido = ucwords(strtolower($request->getParam('apellido')));
		$user->email = strtolower($request->getParam('email'));
		$user->password = password_hash($request->getParam('password'), PASSWORD_DEFAULT);
		$user->documento = $request->getParam('documento');
		$user->fnacimiento = $request->getParam('fnacimiento');
		$user->sexo = strtolower($request->getParam('sexo'));
		$user->rol_id = 3;
		$dom= $request->getParam('domicilio');
		$dm = new Domicilio();
		$dm->direccion = ucwords(strtolower($dom['direccion']));
		$dm->latitud = ucwords(strtolower($dom['latitud']));
		$dm->longitud = ucwords(strtolower($dom['longitud']));
		$dm->save();
		$user->domicilio_id = $dm->id;
		$user->save();
		return $response->withJson($user, 201);
	}

	public function update(Request $request, Response $response)
	{
		/* fistname, apellido, email, password, documento, sexo, role_id, domicilio_id */
		// if ($request->getAttribute('has_errors')) {
		// 	$errors = $request->getAttribute('errors');
		// 	return $response->withJson(["message" => $errors], 400);
  // 		}
		$id = $request->getAttribute('id');
		$user = null;
		try {
			$user = User::where('id', $id)->firstOrFail($id);
		} catch (ModelNotFoundException $e) {
			$data = [
			"message" => "Usuario no encontrado"
			];
			return $response->withJson($data, 404);
		}		
		$email = $request->getParam('email');

		if (strcasecmp($user->email, $email) !== 0 && $email !== null && User::where('email', $email)->count() < 1) {

			$user->email = $email;
			$user->nombre = ($request->getParam('nombre') !== null) ? ucwords(strtolower($request->getParam('nombre'))) : $user->nombre;
			$user->apellido = ($request->getParam('apellido') !== null) ? ucwords(strtolower($request->getParam('apellido'))) : $user->apellido;
			$user->password = ($request->getParam('password') !== null) ? password_hash($request->getParam('password'), PASSWORD_DEFAULT) : $user->password;
			$user->sexo = ($request->getParam('sexo') !== null) ? strtolower($request->getParam('sexo')) : $user->sexo;
			if(true) {
				$user->documento = ($request->getParam('documento') !== null) ? $request->getParam('documento') : $user->documento;
				$user->rol_id = ($request->getParam('rol_id') !== null) ? $request->getParam('rol_id') : $user->rol_id;
				// $user->domicilio_od = ($request->getParam('domicilio_od') !== null) ? $request->getParam('domicilio_od') : $user->domicilio_od;
			}
			$user->save();
			return $response->withJson($user, 200);
		}	

		return $response->withJson([
			"status" => "error",
			"message" => ["email" => "El email ya se encuentra registrado"]
		], 400);
	}

	public function uploadImage()
	{
		//Posteriormente se sacará el ID del JWT
		$id = $request->getAttribute('id');
		$user = null;
		try {
			$user = User::where('id', $id)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			$data = [
			"message" => "Usuario no encontrado"
			];
			return $response->withJson($data, 404);
		}		
		$files = $request->getUploadedFiles();
			
		$newfile = $files['image'];
			
		if ($newfile->getError() === UPLOAD_ERR_OK) {
		    $uploadFileName = $newfile->getClientFilename();
		    $fileName = time();
		    $path = "files/images/".$fileName.".jpg";
		    $newfile->moveTo($path);
		    $user->image = $fileName;
		    $user->save();
		    return $response->withJson($user, 200);
		}
		return $response->withJson(["message" => "Error al subir image"], 400);
	}

	public function getUsersByRol(Request $request, Response $response)
	{
		$id = $request->getAttribute('id');		
		$users = null;
		try {
			$users = User::where('rol_id', $id)->get();			
		} catch (ModelNotFoundException $e) {
			return $response->withJson(['message' => 'No se encontraron usuarios'], 404);
		}
		return $response->withJson($users, 200);
	}
}
