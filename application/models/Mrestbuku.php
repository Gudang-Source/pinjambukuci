<?php 
	class Mrestbuku extends CI_Model{
		public function get_buku($id=null){
			if($id!=null){
				$this->db->where('nbsn', $id);
			}
			return $this->db->get('buku');
        }
        
        public function input_buku($data){
			$this->db->insert('buku', $data);
			return $this->db->affected_rows();
        }

        public function edit_buku($data, $id){
			$this->db->update('buku', $data, ['nbsn' => $id]);
			return $this->db->affected_rows();
		}
        
		public function del_buku($id){
			$this->db->where('nbsn', $id);
			$this->db->delete('buku');
			return $this->db->affected_rows();
		}
		
	}
 ?>