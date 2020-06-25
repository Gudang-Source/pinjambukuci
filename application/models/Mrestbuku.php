<?php 
	class Mrestbuku extends CI_Model{
		public function get_buku($id=null){
			if($id!=null){
				$this->db->where('nbsn', $id);
			}
			return $this->db->get('buku');
		}
		// public function del_mhs($id){
		// 	$this->db->where('nim', $id);
		// 	$this->db->delete('mahasiswa');
		// 	return $this->db->affected_rows();
		// }
		// public function input_mhs($data){
		// 	$this->db->insert('mahasiswa', $data);
		// 	return $this->db->affected_rows();
		// }
		// public function edit_mhs($data, $id){
		// 	$this->db->update('mahasiswa', $data, ['nim' => $id]);
		// 	return $this->db->affected_rows();
		// }
	}
 ?>