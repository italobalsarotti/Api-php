<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';


class Api extends RestController {

	function __construct() {

        parent::__construct();
        $this->load->model('api/Model_Category');
        $this->load->model('api/Model_Pet');
        $this->load->model('api/Model_Tag');

    }

    public function index_get(){
    	$this->load->view('api');
    }

   	/* Modulo Pet */
	public function pet_get($id = NULL){

		$status = $this->get('status');

		if (!isset($status)) {

			if ($id !== NULL) {

				$resultado=$this->Model_Pet->idGet($id);

				if ($resultado !== NULL) {
					$this->response($resultado, 200);
				}else{
					$this->response([
						'status' => false,
						'message' => 'No such pet found'
					], 404);
				}

			}else{
				$resultado=$this->Model_Pet->Get();
				$this->response($resultado, 200);
			}

		}else{

			$status = $this->get('status');
			$resultado=$this->Model_Pet->statusGet($status);

			if ($resultado !== NULL) {
				$this->response($resultado, 200);
			}else{
				$this->response([
					'status' => false,
					'message' => 'No such status found'
				], 404);
			}
			
		}
		
		
	}

	public function pet_post(){

		$body = json_decode(file_get_contents("php://input"), true);

		//datos reales
		$category=$body['category'];
		$name=$body['name'];
		$photoUrls=$body['photoUrls'];
		$tags=$body['tags'];
		$status=$body['status'];

		if (isset($category,$name,$photoUrls,$tags,$status)) {

			if ($category == '' or $name == '' or $photoUrls == '' or $tags == '' or $status == '') {

				$this->response([
					'status' => false,
					'message' => 'Todos los Campos son Obligatorios',
					'error' => true
				], 400);

			}else{

				$resultado=$this->Model_Pet->Post($category,$name,$photoUrls,$tags,$status);

				if (!$resultado) {
					$this->response([
						'status' => false,
						'message' => 'Something went wrong'
					], 500);

				}else{

					$body['id'] = $resultado;
					$this->response([
						'status' => true,
						'data' => $body,
						'message' => 'Pet recorded'
					], 201);
				}
			}

		}else{
			$this->response([
				'status' => false,
				'message' => 'Bab Syntax'
			], 400);
		}
	}

	public function pet_put($id = NULL){
		$body = json_decode(file_get_contents("php://input"), true);

		//datos reales
		$category=$body['category'];
		$name=$body['name'];
		$photoUrls=$body['photoUrls'];
		$tags=$body['tags'];
		$status=$body['status'];

		if ($id !== NULL) {

			$resultado=$this->Model_Pet->idGet($id);

			if ($resultado !== NULL) {

				if (isset($category,$name,$photoUrls,$tags,$status)) {

					if ($category == '' or $name == '' or $photoUrls == '' or $tags == '' or $status == '') {

						$this->response([
							'status' => false,
							'message' => 'Todos los Campos son Obligatorios',
							'error' => true
						], 400);

					}else{

						$updated=$this->Model_Pet->Put($category,$name,$photoUrls,$tags,$status,$id);

						if ($updated) {
							$this->response([
								'status' => true,
								'message' => 'Pet updated'
							], 200);
						}else{
							$this->response([
								'status' => false,
								'message' => 'Something went wrong'
							], 500);
						}
					}

				}else{
					$this->response([
						'status' => false,
						'message' => 'Bab Syntax'
					], 400);
				}

			}else{
				$this->response([
					'status' => false,
					'message' => 'No such pet found'
				], 404);
			}		
		}
	}

	public function pet_delete($id = NULL){
		if ($id !== NULL) {

			$resultado=$this->Model_Pet->idGet($id);

			if ($resultado !== NULL) {

				$deleted=$this->Model_Pet->Delete($id);

				if ($deleted) {
					$this->response([
						'status' => true,
						'message' => 'Pet deleted'
					], 200);
				}else{
					$this->response([
						'status' => false,
						'message' => 'Something went wrong'
					], 500);
				}

			}else{
				$this->response([
					'status' => false,
					'message' => 'No such pet found'
				], 404);
			}		
		}
	}

	/* Modulo Tag */
	public function tag_get($id = NULL){

		if ($id !== NULL) {

			$resultado=$this->Model_Tag->getBuscar($id);

			if ($resultado !== NULL) {
				$this->response($resultado, 200);
			}else{
				$this->response([
					'status' => false,
					'message' => 'No such tag found'
				], 404);
			}


		}else{
			$resultado=$this->Model_Tag->Get();
			$this->response($resultado, 200);
		}

	}

    /* Modulo Category */
	public function category_get($id = NULL){

		if ($id !== NULL) {

			$resultado=$this->Model_Category->getBuscar($id);

			if ($resultado !== NULL) {
				$this->response($resultado, 200);
			}else{
				$this->response([
					'status' => false,
					'message' => 'No such category found'
				], 404);
			}


		}else{
			$resultado=$this->Model_Category->Get();
			$this->response($resultado, 200);
		}

	}

	public function category_post(){

		$body = json_decode(file_get_contents("php://input"), true);
		$resultado=$this->Model_Category->Post($body);

		if (!$resultado) {
			$this->response([
				'status' => false,
				'message' => 'Something went wrong'
			], 500);
		}else{
			$body['id'] = $resultado;
			$this->response([
				'status' => true,
				'data' => $body,
				'message' => 'Category recorded'
			], 201);
		}
		
	}

	public function category_put($id = NULL){
		$body = json_decode(file_get_contents("php://input"), true);

		if ($id !== NULL) {

			$resultado=$this->Model_Category->getBuscar($id);

			if ($resultado !== NULL) {

				$updated=$this->Model_Category->Put($body,$id);

				if ($updated) {
					$this->response([
						'status' => true,
						'message' => 'Pet updated'
					], 200);
				}else{
					$this->response([
						'status' => false,
						'message' => 'Something went wrong'
					], 500);
				}

			}else{
				$this->response([
					'status' => false,
					'message' => 'No such category found'
				], 404);
			}		
		}
	}

	public function category_delete($id = NULL){
		if ($id !== NULL) {

			$resultado=$this->Model_Category->getBuscar($id);

			if ($resultado !== NULL) {

				$deleted=$this->Model_Category->Delete($id);

				if ($deleted) {
					$this->response([
						'status' => true,
						'message' => 'Category deleted'
					], 200);
				}else{
					$this->response([
						'status' => false,
						'message' => 'Something went wrong'
					], 500);
				}

			}else{
				$this->response([
					'status' => false,
					'message' => 'No such category found'
				], 404);
			}		
		}
	}


	public function prueba_post(){
		$body = json_decode(file_get_contents("php://input"), true);
		if (json_last_error()==0) {

			if (isset($body['nombre'])) {

				$nombre = $body['nombre'];

				if ($body['nombre'] == '') {

					$this->response([
						'message' => 'El Campo nombre es requerido'
					], 400);
				}

			}else{
				echo "error al insertar datos";
			}
			

		}else{
			$this->response([
				'status' => false,
				'message' => 'Bab Syntax'
			], 400);
		}
	}
}
