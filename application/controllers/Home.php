<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('M_nasabah');
        $this->load->model('M_kategori');
        $this->load->model('M_sampah_masuk');
        $this->load->model('M_sampah_terjual');
    }
    
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['nasabah_count'] =$this->M_nasabah->get_nasabah_count();
        $data['kategori_count'] =$this->M_kategori->get_kategori_count();
        $data['sampah_masuk_count'] =$this->M_sampah_masuk->get_sampah_masuk_count();
        $data['sampah_terjual_count'] =$this->M_sampah_terjual->get_sampah_terjual_count();

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/v_home/read', $data);
        $this->load->view('backend/templates/footer');
    }
}
