<?php 

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Materia;

class MateriaController extends Controller {

	public function create(Request $request, Response $response)
	{
		$nombre = (strtoupper($request->getParam('nombre')));		
		$repetido = Materia::where('nombre', 'LIKE', '%'.$nombre.'%')->first();
		if (!$repetido) {
			$nueva = new Materia;
			$nueva->nombre = $nombre;
			$nueva->save();
			return $response->withJson($nueva, 201);
		}
		return $response->withJson([
			'message' => 'La materia ya se encuentra registrada'
		]);
	}

	public function all(Request $request, Response $response)
	{
		$materias = null;
		$materias = Materia::all();
		if (count($materias) < 1) {
			return $response->withJson(['message' => 'No se encontraron materias registradas']);
		}
		return $response->withJson($materias, 200);
	}

	public function find(Request $request, Response $response)
	{
		$id = $request->getParam('id');
		$materia = null;
		try {
			$materia = Materia::where('id', $id)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			return $response->withJson(['message' => 'No se encontró la materia'], 404);
		}
		return $response->withJson($materia, 200);
	}

	public function delete(Request $request, Response $response)
	{
		$id = $request->getParam('id');
		$materia = null;
		try {
			$materia = Materia::where('id', $id)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			return $response->withJson(['message' => 'No se encontró la materia'], 404);
		}
		$materia->delete();
		return $response->withJson(['message' => 'Se eliminó la materia']);
	}
}
