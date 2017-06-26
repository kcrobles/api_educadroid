<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Controllers\Controller;
use App\Models\User;
use \finfo;

class ImageController extends Controller {

	//Directorio donde se almacenaran las imágenes (RELATIVO AL INDEX.PHP)
	private static $STORAGE_FILE_PATH = 'uploads/images/';	

	public function uploadUserPhoto(Request $request, Response $response)
	{
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
		//Obtengo los archivos subidos
		$files = $request->getUploadedFiles();
		//Extensiones válidas
		$extensiones = ['jpg', 'jpeg', 'png', 'gif'];		
		$newfile = $files['image'];
		if ($newfile->getError() === UPLOAD_ERR_OK) {
			//Obtengo el nombre del archivo del cliente
		    $uploadFileName = strtolower($newfile->getClientFilename());
		    //Obtengo la extension
		    $name_ext = explode('.', $uploadFileName);
		    $ext = end($name_ext);
		    //verifico q sea una extensión válida
		    if(!in_array($ext, $extensiones)) {
		    	$data = ["message" => "El archivo no es una imagen"];
		    	return $response->withJson($data, 400);
		    }
		    //nombre único para el archivo
		    $fileName = time();
		    //
		    $path = self::$STORAGE_FILE_PATH.$fileName.".".$ext;
		    $newfile->moveTo($path);
		    $item->image = $fileName.".".$ext;
		    $item->save();
		    return $response->withJson($item, 200);
		}	
		return $response->withJson(["message" => "Error al subir image"], 400);
	}

	public function getImageUploaded(Request $request, Response $response)
	{
		$img = $request->getAttribute('image');
		$file = self::$STORAGE_FILE_PATH.$img;
		if(file_exists($file)) {
			$ext = self::getImageExtension($img);
			$image = file_get_contents($file);
			$response = $response->withHeader('Content-Type', 'image/'.$ext);
			echo $image;
			return $response;
		} else {
			$response_img = 'image-not-found.png';
			$ext = self::getImageExtension($response_img);
			$not_found = self::$STORAGE_FILE_PATH.$response_img;
			$image = file_get_contents($not_found);
			$response = $response->withHeader('Content-Type', 'image/'.$ext);
			echo $image;
			return $response;
		}
	}

	private static function getImageExtension($img) {
		$name_ext = explode('.', $img);
		$ext = end($name_ext);
		return $ext;
	}
}