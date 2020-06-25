<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

        function __construct(){
                parent::__construct();
                $this->load->model('Mdashboard');

                if($this->session->userdata('user')){

		}
		else{
			redirect('login');
		}
        }

	public function index(){
                $username = $this->session->userdata('user');
                $quser = $this->db->get_where('login', array('username'=>$username))->row();
                $data = array(
                        'title' => 'Dashboard | Pinjambuku',
                        'user' => $quser->nama
                );
                $this->load->view('home/_header', $data);
                $this->load->view('home/home');
                $this->load->view('home/_footer');
        }

        public function buku(){
                $username = $this->session->userdata('user');
                $quser = $this->db->get_where('login', array('username'=>$username))->row();
                $buku = $this->Mdashboard->get_buku()->result();
                $data = array(
                        'title' => 'Buku | Pinjambuku',
                        'buku' => $buku,
                        'user' => $quser->nama
                );
                $this->load->view('home/_header', $data);
                $this->load->view('home/buku');
                $this->load->view('home/_footer');
        }

        public function addbook(){
                $input = $this->input->post(null, false);
                $this->Mdashboard->inputbook($input);
                $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan');
                redirect('dashboard/buku');
        }

        public function editbook($id){
                $username = $this->session->userdata('user');
                $quser = $this->db->get_where('login', array('username'=>$username))->row();
                $buku = $this->Mdashboard->get_buku($id)->row();
                $data = array(
                        'title' => 'Edit Buku | Pinjambuku',
                        'buku' => $buku,
                        'user' => $quser->nama
                );
                $this->load->view('home/_header', $data);
                $this->load->view('home/edit_buku');
                $this->load->view('home/_footer');
        }

        public function proses_editbook(){
                $input = $this->input->post(null, false);
                $this->Mdashboard->editbook($input);
                $this->session->set_flashdata('berhasil', 'Data berhasil diubah');
                redirect('dashboard/buku');
        }

        public function delbook($id){
                $this->Mdashboard->delbook($id);
                $this->session->set_flashdata('berhasil', 'Data berhasil dihapus');
                redirect('dashboard/buku');
        }

        public function anggota(){
                $username = $this->session->userdata('user');
                $quser = $this->db->get_where('login', array('username'=>$username))->row();
                $anggota = $this->Mdashboard->get_anggota()->result();
                $data = array(
                        'title' => 'Anggota | Pinjambuku',
                        'anggota' => $anggota,
                        'user' => $quser->nama
                );
                $this->load->view('home/_header', $data);
                $this->load->view('home/anggota');
                $this->load->view('home/_footer');
        }

        public function addanggota(){
                $input = $this->input->post(null, false);
                $this->Mdashboard->inputanggota($input);
                $this->session->set_flashdata('berhasil', 'Data berhasil ditambahkan');
                redirect('dashboard/anggota');
        }

        public function editanggota($id){
                $username = $this->session->userdata('user');
                $quser = $this->db->get_where('login', array('username'=>$username))->row();
                $anggota = $this->Mdashboard->get_anggota($id)->row();
                $data = array(
                        'title' => 'Edit Anggota | Pinjambuku',
                        'anggota' => $anggota,
                        'user' => $quser->nama
                );
                $this->load->view('home/_header', $data);
                $this->load->view('home/edit_anggota');
                $this->load->view('home/_footer');
        }

        public function proses_editanggota(){
                $input = $this->input->post(null, false);
                $this->Mdashboard->editanggota($input);
                $this->session->set_flashdata('berhasil', 'Data berhasil diubah');
                redirect('dashboard/anggota');
        }

        public function delanggota($id){
                $this->Mdashboard->delanggota($id);
                $this->session->set_flashdata('berhasil', 'Data berhasil dihapus');
                redirect('dashboard/anggota');
        }

        public function peminjam(){
                $username = $this->session->userdata('user');
                $quser = $this->db->get_where('login', array('username'=>$username))->row();
                $buku = $this->Mdashboard->get_buku()->result();
                $anggota = $this->Mdashboard->get_anggota()->result();
                $peminjam = $this->Mdashboard->get_peminjam()->result();
                $data = array(
                        'title' => 'Peminjam | Pinjambuku',
                        'peminjam' => $peminjam,
                        'buku' => $buku,
                        'anggota' => $anggota,
                        'user' => $quser->nama
                );
                $this->load->view('home/_header', $data);
                $this->load->view('home/peminjam');
                $this->load->view('home/_footer');
        }

        public function pinjambook(){
                $input = $this->input->post(null, false);
                $this->Mdashboard->pinjam($input);
                $this->session->set_flashdata('berhasil', 'Data pinjaman berhasil ditambahkan');
                redirect('dashboard/peminjam');
        }

        public function changestatus($id){
                $this->Mdashboard->change($id);
                $this->session->set_flashdata('berhasil', 'Status pinjam berhasil diubah');
                redirect('dashboard/peminjam');
        }

        public function delpinjam($id){
                $this->Mdashboard->delpinjam($id);
                $this->session->set_flashdata('berhasil', 'Data berhasil dihapus');
                redirect('dashboard/peminjam');
        }

}