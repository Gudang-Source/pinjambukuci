<?php
    class Mdashboard extends CI_Model{
        
        public function get_buku($id=null){
            if($id!=null){
                $this->db->where('nbsn', $id);
            }
            $query = $this->db->get('buku');
            return $query;
        }

        public function inputbook($data){
            $param = array(
                'nbsn' => $data['nbsn'],
                'judul' => $data['judul'],
                'pengarang' => $data['pengarang'],
                'penerbit' => $data['penerbit'],
                'tahun' => $data['tahun'],
                'stok' => $data['stok'],
            );
            $this->db->insert('buku', $param);
        }

        public function delbook($id){
            $this->db->where('nbsn', $id);
            $this->db->delete('buku');
        }

        public function editbook($data){
            $param = array(
                'judul' => $data['judul'],
                'pengarang' => $data['pengarang'],
                'penerbit' => $data['penerbit'],
                'tahun' => $data['tahun'],
                'stok' => $data['stok'],
            );
            $this->db->update('buku', $param, array('nbsn'=>$data['nbsn']));
        }

        public function get_anggota($id=null){
            if($id!=null){
                $this->db->where('id_anggota', $id);
            }
            $query = $this->db->get('anggota');
            return $query;
        }

        public function inputanggota($data){
            $param = array(
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'no_telepon' => $data['no_telepon']
            );
            $this->db->insert('anggota', $param);
        }

        public function editanggota($data){
            $param = array(
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'no_telepon' => $data['no_telepon']
            );
            $this->db->update('anggota', $param, array('id_anggota'=>$data['id']));
        }

        public function delanggota($id){
            $this->db->where('id_anggota', $id);
            $this->db->delete('anggota');
        }

    }
?>