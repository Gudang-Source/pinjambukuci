<?php

    Class Mlogin extends CI_Model{

        public function userauth($user, $pass){
            return $this->db->get_where('login', array('username'=>$user, 'password'=>$pass));
        }

        public function register($data){
            $param = array(
                'nama' => $data['nama'],
                'username' => $data['username'],
                'password' => md5($data['password'])
            );
            $this->db->insert('login', $param);
        }
    }

?>