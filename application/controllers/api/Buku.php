<?php 
	use Restserver\Libraries\REST_Controller;
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	

	require APPPATH . 'libraries/REST_Controller.php';
	
	require APPPATH . 'libraries/Format.php';


	class Buku extends REST_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Mrestbuku');
		}

		public function index_get(){
			$id = $this->get('nbsn');
			if($id===null){
				$buku = $this->Mrestbuku->get_buku()->result();				
			}
			else{
				$buku = $this->Mrestbuku->get_buku($id)->result();
			}
			if($buku){
				$this->response([
                    'status' => TRUE,
                    'data' => $buku
                ], REST_Controller::HTTP_OK);
			}
			else{
				$this->response([
                    'status' => FALSE,
                    'message' => 'data not found'
                ], REST_Controller::HTTP_NOT_FOUND);
			}
		}

		public function index_post(){
			$data = [
				'nbsn'=>$this->post('nbsn'),
				'judul'=>$this->post('judul'),
				'pengarang'=>$this->post('pengarang'),
                'penerbit'=>$this->post('penerbit'),
                'tahun'=>$this->post('tahun'),
                'stok'=>$this->post('stok')
			];

			if($this->Mrestbuku->input_buku($data)>0){
				$this->response([
                    	'status' => TRUE,
                    	'message'=>'buku telah ditambahkan'
                	], REST_Controller::HTTP_CREATED);
			}
			else{
				$this->response([
	                    'status' => FALSE,
	                    'message' => 'gagal menambahkan data!'
                	], REST_Controller::HTTP_BAD_REQUEST);
			}
        }
        
        public function index_put(){
			$id = $this->put('nbsn');
			$data = [
				'judul'=>$this->post('judul'),
				'pengarang'=>$this->post('pengarang'),
                'penerbit'=>$this->post('penerbit'),
                'tahun'=>$this->post('tahun'),
                'stok'=>$this->post('stok')
			];
			if($this->Mrestbuku->edit_buku($data, $id)>	0){
				$this->response([
                    	'status' => TRUE,
                    	'message'=>'buku telah diubah'
                	], REST_Controller::HTTP_OK);
			}
			else{
				$this->response([
	                    'status' => FALSE,
	                    'message' => 'gagal mengubah data!'
                	], REST_Controller::HTTP_BAD_REQUEST);
			}
		}

		public function index_delete(){
			$id = $this->delete('nbsn');
			if($id==null){
				$this->response([
                    'status' => FALSE,
                    'message' => 'provide an id!'
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
			else{
				if($this->Mrestbuku->del_buku($id) > 0){
					$this->response([
	                    'status' => TRUE,
	                    'message' => 'deleted'
                	], REST_Controller::HTTP_OK);
				}
				else{
					$this->response([
	                    'status' => FALSE,
	                    'message' => 'id not found!'
                	], REST_Controller::HTTP_BAD_REQUEST);
				}
			}
		}

	}
 ?>