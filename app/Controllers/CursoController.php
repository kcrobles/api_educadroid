<?php 

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Curso;

class CursoController extends Controller {

	public function create(Request $request, Response $response)
	{
		
	}

	public function all(Request $request, Response $response)
	{
		$cursos = Curso::with('materia', 'division')->get();
		return $response->withJson($cursos, 200);
	}

	public function find(Request $request, Response $response)
	{
		$id = $request->getAttribute('id');
		$curso = null;
		try {
			$curso = Curso::where('id', $id)->with('materia', 'divison')->firstOrFail();
		} catch (ModelNotFoundException $e) {
			return $response->withJson(['message' => 'No se encontró el registro'], 404);
		}
		return $response->withJson($curso, 200);
	}

	public function delete(Request $request, Response $response)
	{
		
	}
}
