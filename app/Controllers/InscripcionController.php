<?php 

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Inscripcion;

class InscripcionController extends Controller {

	public function create(Request $request, Response $response)
	{
		$legajo = $request->getParam('legajo');
		$curso_id = $request->getParam('curso_id');
		$inscripcion = new Inscripcion;
		$inscripcion->legajo = $legajo;
		$inscripcion->curso_id = $curso_id;
		$inscripcion->save();
		return $response->withJson([
			'message' => 'El alta se realizó con éxito'
		], 200);
	}

	public function all(Request $request, Response $response)
	{
		$todas = Inscripcion::with('legajos.user', 'cursos.division', 'cursos.materia')->get();
		$response->withJson($todas, 200);
	}

	public function find(Request $request, Response $response)
	{
		$id = $request->getAttribute('id');
		$ins = null;
		try {
			$ins = Inscripcion:where('id', $id)->with('legajos.user', 'cursos.division', 'cursos.materia')->firstOrFail();	
		} catch(ModelNotFoundException $e) {
			return $response->withJson(['message' => 'No se encontró registro de inscripción'], 404);
		}
		return $response->withJson($ins, 200);
		
	}

	public function delete(Request $request, Response $response)
	{
		id = $request->getAttribute('id');
		$ins = null;
		try {
			$ins = Inscripcion:where('id', $id)->with('legajos.user', 'cursos.division', 'cursos.materia')->firstOrFail();	
		} catch(ModelNotFoundException $e) {
			return $response->withJson(['message' => 'No se encontró registro de inscripción'], 404);
		}
		$ins->delete();
		return $response->withJson(['message' => 'Se eliminó el registro'], 200);
	}
}
