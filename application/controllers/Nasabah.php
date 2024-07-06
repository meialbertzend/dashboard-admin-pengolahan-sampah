<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_nasabah');
        $this->load->library('form_validation');
        IsLoggedIn(); // Cek apakah pengguna sudah login
    }

    public function index()
    {
        // Tangkap data
        $data['title'] = 'Nasabah';
        $data['nasabah'] = $this->M_nasabah->GetAllNasabah();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/v_nasabah/read', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Nasabah';
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_nasabah/create', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $this->M_nasabah->create();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('nasabah');
        }
    }

    public function edit($id_nasabah)
    {
        $data['title'] = 'Edit Data Nasabah';
        $data['nasabah'] = $this->M_nasabah->getNasabahById($id_nasabah);
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_nasabah/edit', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $nasabahData = array(
                'nama_nasabah' => $this->input->post('nama_nasabah'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat')
            );

            $this->M_nasabah->edit($id_nasabah, $nasabahData);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('nasabah');
        }
    }


    public function delete($id_nasabah)
    {
        $this->M_nasabah->delete($id_nasabah);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('nasabah');
    }
}
