<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\Pregunta;
use App\Models\User;
use App\Models\Resultado;


class ResultadosController extends Controller {

	public function create(Request $request, Response $response)
	{
    $preguntas = $request->getParam('preguntas');

		$i = 0;

    foreach ($preguntas as $item) {
      $resultado = new Resultado;
      $resultado->pregunta_id = $item['id'];
      $resultado->user_id = $request->getParam('user_id');
      $resultado->resultado = $request->getParam('resultados')[$i];
      $resultado->save();
			$i = $i + 1;
    }

		return $response->withJson($resultado, 201);
	}

	public function all(Request $request, Response $response)
	{
		$resultados = Resultado::with('pregunta.encuesta')->get();

		return $response->withJson($resultados, 201);
	}

	public function findByEncuestaAndUser(Request $request, Response $response)
	{
    $resultados = Resultado::with(['preguntas' => function ($query) {
      $query->where('encuesta_id', $request->getParam('encuesta_id'));
    }])->get();

		$resultados = $resultados->where('user_id', $request->getParam('user_id'))->get();

		return $response->withJson($resultados, 201);
	}

}
