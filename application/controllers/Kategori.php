<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori');
        $this->load->library('form_validation');
        IsLoggedIn(); // Cek apakah pengguna sudah login
    }

    public function index()
    {
        // Tangkap data
        $data['title'] = 'Kategori Sampah';
        $data['kategori'] = $this->M_kategori->GetAllKategori();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/v_kategori/read', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Kategori';
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_kategori/create', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $this->M_kategori->create();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('kategori');
        }
    }

    public function edit($id_kategori)
    {
        $data['title'] = 'Edit Data Kategori';
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['kategori'] = $this->M_kategori->getKategoriById($id_kategori);

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_kategori/edit', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $this->M_kategori->edit($id_kategori);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('kategori');
        }
    }

    public function delete($id_kategori)
    {
        $this->M_kategori->delete($id_kategori);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('kategori');
    }
}
