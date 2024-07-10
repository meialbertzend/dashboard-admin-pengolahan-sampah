<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sampah_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sampah_masuk');
        $this->load->model('M_nasabah');
        $this->load->model('M_kategori');
        $this->load->model('M_admin');
        $this->load->library('form_validation');
        IsLoggedIn(); // Cek apakah pengguna sudah login
        IsAdmin();
    }

    public function index()
    {
        $data['title'] = 'Data Sampah Masuk';
        $data['sampah_masuk'] = $this->M_sampah_masuk->GetAllSampahMasuk();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/v_sampah_masuk/read', $data);
        $this->load->view('backend/templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Data Sampah Masuk';
        $data['admin'] = $this->M_admin->GetAllAdmin();
        $data['nasabah'] = $this->M_nasabah->GetAllNasabah();
        $data['kategori_sampah'] = $this->M_kategori->GetAllKategori();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->form_validation->set_rules('id_nasabah', 'Nama Nasabah', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori Sampah', 'required');
        $this->form_validation->set_rules('tgl_pengumpulan', 'Tanggal Pengumpulan', 'required');
        $this->form_validation->set_rules('berat', 'Berat Sampah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_sampah_masuk/create', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $adminId = $this->session->userdata('id_admin');

            $data = [
                'id_admin' => $adminId,
                'id_nasabah' => $this->input->post('id_nasabah'),
                'id_kategori' => $this->input->post('id_kategori'),
                'tgl_pengumpulan' => $this->input->post('tgl_pengumpulan'),
                'berat' => $this->input->post('berat'),
            ];

            $this->M_sampah_masuk->create($data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('sampah_masuk');
        }
    }

    public function edit($id_sampah_masuk)
    {
        $data['title'] = 'Edit Data Sampah Masuk';
        $data['admin'] = $this->M_admin->GetAllAdmin();
        $data['nasabah'] = $this->M_nasabah->GetAllNasabah();
        $data['kategori_sampah'] = $this->M_kategori->GetAllKategori();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['sampah_masuk'] = $this->M_sampah_masuk->getSampahMasukById($id_sampah_masuk);

        $this->form_validation->set_rules('id_nasabah', 'Nama Nasabah', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori Sampah', 'required');
        $this->form_validation->set_rules('tgl_pengumpulan', 'Tanggal Pengumpulan', 'required');
        $this->form_validation->set_rules('berat', 'Berat Sampah', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_sampah_masuk/edit', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $adminId = $this->session->userdata('id_admin');

            $data = [
                'id_admin' => $adminId,
                'id_nasabah' => $this->input->post('id_nasabah'),
                'id_kategori' => $this->input->post('id_kategori'),
                'tgl_pengumpulan' => $this->input->post('tgl_pengumpulan'),
                'berat' => $this->input->post('berat'),
            ];

            $this->M_sampah_masuk->edit($id_sampah_masuk, $data);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('sampah_masuk');
        }
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['title'] = 'Hasil Pencarian';
        $data['sampah_masuk'] = $this->M_sampah_masuk->search($keyword);
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/v_sampah_masuk/read', $data);
        $this->load->view('backend/templates/footer');
    }

    public function delete($id_sampah_masuk)
    {
        $this->M_sampah_masuk->delete($id_sampah_masuk);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('sampah_masuk');
    }
}
