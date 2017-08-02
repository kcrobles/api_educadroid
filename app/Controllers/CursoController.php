<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Curso;
use App\Models\User;
use App\Models\CursoEncuesta;

class CursoController extends Controller {

	public function create(Request $request, Response $response)
	{

	}

	public function all(Request $request, Response $response)
	{
		$cursos = Curso::with('materia', 'division')->get();
		return $response->withJson($cursos, 200);
	}

	public function getByUser(Request $request, Response $response)
	{
		try {
			$id = $request->getAttribute('id');
			$user = User::where('id', $id)->firstOrFail();

			$cursos = $user->cursos()->with('division','materia')->get();

		} catch (ModelNotFoundException $e) {
			return $response->withJson(['message' => 'No se encontró el registro'], 404);
		}
		return $response->withJson($cursos, 200);
	}

	public function delete(Request $request, Response $response)
	{

	}
}
