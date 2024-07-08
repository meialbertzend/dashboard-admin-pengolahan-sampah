<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sampah_terjual extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sampah_terjual');
        $this->load->model('M_kategori');
        $this->load->model('M_admin');
        $this->load->library('form_validation');
        IsLoggedIn(); // Cek apakah pengguna sudah login
    }

    public function index()
    {
        $data['title'] = 'Data Sampah Terjual';
        $data['sampah_terjual'] = $this->M_sampah_terjual->GetAllSampahTerjual();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $harga_data = $this->M_sampah_terjual->get_harga_data();
        $data['harga_data'] = array_column($harga_data, 'harga');

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/v_sampah_terjual/read', $data);
        $this->load->view('backend/templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Sampah Terjual';
        $data['admin'] = $this->M_admin->GetAllAdmin();
        $data['kategori_sampah'] = $this->M_kategori->GetAllKategori();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->form_validation->set_rules('id_kategori', 'Kategori Sampah', 'required');
        $this->form_validation->set_rules('tgl_terjual', 'Tanggal Terjual', 'required');
        $this->form_validation->set_rules('berat', 'Berat Sampah', 'required');
        $this->form_validation->set_rules('harga', 'Harga Sampah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_sampah_terjual/create', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $adminId = $this->session->userdata('id_admin');

            $data = [
                'id_admin' => $adminId,
                'id_kategori' => $this->input->post('id_kategori'),
                'tgl_terjual' => $this->input->post('tgl_terjual'),
                'berat' => $this->input->post('berat'),
                'harga' => $this->input->post('harga'),
            ];

            $this->M_sampah_terjual->create($data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('sampah_terjual');
        }
    }

    public function edit($id_sampah_terjual)
    {
        $data['title'] = 'Edit Data Sampah Terjual';
        $data['admin'] = $this->M_admin->GetAllAdmin();
        $data['kategori_sampah'] = $this->M_kategori->GetAllKategori();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['sampah_terjual'] = $this->M_sampah_terjual->getSampahTerjualById($id_sampah_terjual);

        $this->form_validation->set_rules('id_kategori', 'Kategori Sampah', 'required');
        $this->form_validation->set_rules('tgl_terjual', 'Tanggal Terjual', 'required');
        $this->form_validation->set_rules('berat', 'Berat Sampah', 'required');
        $this->form_validation->set_rules('harga', 'Harga Sampah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_sampah_terjual/edit', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $adminId = $this->session->userdata('id_admin');

            $data = [
                'id_admin' => $adminId,
                'id_kategori' => $this->input->post('id_kategori'),
                'tgl_terjual' => $this->input->post('tgl_terjual'),
                'berat' => $this->input->post('berat'),
                'harga' => $this->input->post('harga'),
            ];

            $this->M_sampah_terjual->edit($id_sampah_terjual, $data);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('sampah_terjual');
        }
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['title'] = 'Hasil Pencarian';
        $data['sampah_terjual'] = $this->M_sampah_terjual->search($keyword);
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/v_sampah_terjual/read', $data);
        $this->load->view('backend/templates/footer');
    }

    public function delete($id_sampah_terjual)
    {
        $this->M_sampah_terjual->delete($id_sampah_terjual);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('sampah_terjual');
    }
}
