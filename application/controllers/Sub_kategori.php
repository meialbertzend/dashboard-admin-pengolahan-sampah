<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sub_kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_subkategori');
        $this->load->model('M_kategori'); // Model untuk kategori
        $this->load->library('form_validation'); // Pastikan library form_validation sudah dimuat
        IsLoggedIn(); // Cek apakah pengguna sudah login
    }

    public function index()
    {
        $data['title'] = 'Sub Kategori';
        $data['subkategori'] = $this->M_subkategori->get_all_subkategori();
        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/v_sub_kategori/read', $data);
        $this->load->view('backend/templates/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('jenis_sampah', 'Jenis Sampah', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Sub Kategori';
            $data['kategori'] = $this->M_kategori->get_all_kategori();
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_sub_kategori/create', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $data = [
                'id_kategori' => $this->input->post('id_kategori'),
                'jenis_sampah' => $this->input->post('jenis_sampah'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga')
            ];
            $this->M_subkategori->insert_subkategori($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Kategori berhasil ditambahkan!</div>');
            redirect('sub_kategori');
        }
    }

    public function edit($id_subkategori)
    {
        $id_subkategori = urldecode($id_subkategori); // Dekode URL
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('jenis_sampah', 'Jenis Sampah', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        $data['subkategori'] = $this->M_subkategori->get_subkategori_by_id($id_subkategori);

        if (empty($data['subkategori'])) {
            show_404();
        }

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Sub Kategori';
            $data['kategori'] = $this->M_kategori->get_all_kategori();
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_sub_kategori/edit', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $data = [
                'id_kategori' => $this->input->post('id_kategori'),
                'jenis_sampah' => $this->input->post('jenis_sampah'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga')
            ];
            $this->M_subkategori->update_subkategori($id_subkategori, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Kategori berhasil diupdate!</div>');
            redirect('sub_kategori');
        }
    }

    public function delete($id_subkategori)
    {
        $id_subkategori = urldecode($id_subkategori); // Dekode URL
        $this->M_subkategori->delete_subkategori($id_subkategori);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Kategori berhasil dihapus!</div>');
        redirect('sub_kategori');
    }
}
