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

    foreach ($preguntas as $item) {
      $resultado = new Resultado;
      $resultado->pregunta_id = $item['id'];
      $resultado->user_id = $request->getParam('user_id');
      $resultado->resultado = $item['resultado'];
      $resultado->save();
    }
	}

	public function all(Request $request, Response $response)
	{

	}

	public function find(Request $request, Response $response)
	{
    return $resultados = Resultado::with(['preguntas' => function ($query) {
      $query->where('encuesta_id', '==', '17');
    }])->get();
	}

	public function update(Request $request, Response $response)
	{

	}

	public function delete(Request $request, Response $response)
	{

	}
}
