<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sampah_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sampah_masuk');
        $this->load->model('M_admin');
        $this->load->model('M_nasabah');
        $this->load->model('M_kategori');
        $this->load->model('M_subkategori');
        $this->load->library('form_validation');
        IsLoggedIn(); // Cek apakah pengguna sudah login
    }

    public function index()
    {
        $data['title'] = 'Data Transaksi Setor';
        $data['admin'] = $this->M_admin->GetAllAdmin();
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
        $data['subkategori_sampah'] = $this->M_subkategori->get_all_subkategori();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        // Set rules for form validation
        $this->form_validation->set_rules('id_nasabah', 'Nama Nasabah', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori Sampah', 'required');
        $this->form_validation->set_rules('id_subkategori', 'Jenis Sampah', 'required');
        $this->form_validation->set_rules('tgl_pengumpulan', 'Tanggal Pengumpulan', 'required');
        $this->form_validation->set_rules('berat', 'Berat Sampah', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga Total', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the view with errors
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_sampah_masuk/create', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $adminId = $this->session->userdata('id_admin');
            $id_nasabah = $this->input->post('id_nasabah');
            $id_kategori = $this->input->post('id_kategori');
            $id_subkategori = $this->input->post('id_subkategori');
            $tgl_pengumpulan = $this->input->post('tgl_pengumpulan');
            $berat = $this->input->post('berat');

            // Hitung total harga
            $harga_per_kg = $this->M_sampah_masuk->get_harga_by_id_subkategori($id_subkategori);
            if ($harga_per_kg === NULL) {
                $this->session->set_flashdata('flash', 'Jenis sampah tidak ditemukan.');
                redirect('sampah_masuk/create');
                return;
            }
            $total_harga = $berat * $harga_per_kg;

            $data = [
                'id_admin' => $adminId,
                'id_nasabah' => $id_nasabah,
                'id_kategori' => $id_kategori,
                'id_subkategori' => $id_subkategori,
                'tgl_pengumpulan' => $tgl_pengumpulan,
                'berat' => $berat,
                'harga' => $total_harga
            ];

            // Simpan data ke database
            $insert = $this->M_sampah_masuk->create($data);
            if ($insert) {
                // Update saldo nasabah
                $this->M_sampah_masuk->updateNasabahBalance($id_nasabah, $total_harga);

                $this->session->set_flashdata('flash', 'Data berhasil ditambahkan');
                redirect('sampah_masuk');
            } else {
                $this->session->set_flashdata('flash', 'Gagal menyimpan data');
                redirect('sampah_masuk/create');
            }
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Data Sampah Masuk';
        $data['admin'] = $this->M_admin->GetAllAdmin();
        $data['nasabah'] = $this->M_nasabah->GetAllNasabah();
        $data['kategori_sampah'] = $this->M_kategori->GetAllKategori();
        $data['subkategori_sampah'] = $this->M_subkategori->get_all_subkategori();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();
        $data['sampah_masuk'] = $this->M_sampah_masuk->getSampahMasukById($id);

        if (empty($data['sampah_masuk'])) {
            show_404();
        }

        $this->form_validation->set_rules('id_nasabah', 'Nama Nasabah', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori Sampah', 'required');
        $this->form_validation->set_rules('id_subkategori', 'Jenis Sampah', 'required');
        $this->form_validation->set_rules('tgl_pengumpulan', 'Tanggal Pengumpulan', 'required');
        $this->form_validation->set_rules('berat', 'Berat Sampah', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_sampah_masuk/edit', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $adminId = $this->session->userdata('id_admin');
            $id_nasabah = $this->input->post('id_nasabah');
            $id_subkategori = $this->input->post('id_subkategori');
            $berat = $this->input->post('berat');

            // Dapatkan harga berdasarkan id_subkategori
            $harga_per_kg = $this->M_sampah_masuk->get_harga_by_id_subkategori($id_subkategori);
            if ($harga_per_kg === NULL) {
                $this->session->set_flashdata('flash', 'Jenis sampah tidak ditemukan.');
                redirect('sampah_masuk/edit/' . $id);
                return;
            }
            $total_harga = $berat * $harga_per_kg;

            $data = [
                'id_admin' => $adminId,
                'id_nasabah' => $id_nasabah,
                'id_kategori' => $this->input->post('id_kategori'),
                'id_subkategori' => $id_subkategori,
                'tgl_pengumpulan' => $this->input->post('tgl_pengumpulan'),
                'berat' => $berat,
                'harga' => $total_harga
            ];

            $this->M_sampah_masuk->edit($id, $data);

            // Update saldo nasabah setelah edit
            $current_balance = $this->M_nasabah->getSaldoNasabah($id_nasabah)['saldo'];
            $new_balance = $current_balance + $total_harga;
            $this->M_nasabah->updateSaldo($id_nasabah, $new_balance);

            $this->session->set_flashdata('flash', 'Diubah');
            redirect('sampah_masuk');
        }
    }


    public function delete($id)
    {
        $sampah_masuk = $this->M_sampah_masuk->getSampahMasukById($id);
        if ($sampah_masuk) {
            // Ambil id_nasabah dan total_harga untuk mengurangi saldo
            $id_nasabah = $sampah_masuk['id_nasabah'];
            $total_harga = $sampah_masuk['harga'];

            // Kurangi saldo nasabah
            $current_balance = $this->M_nasabah->getSaldoNasabah($id_nasabah)['saldo'];
            $new_balance = $current_balance - $total_harga;
            $this->M_nasabah->updateSaldo($id_nasabah, $new_balance);

            $this->M_sampah_masuk->delete($id);
            $this->session->set_flashdata('flash', 'Dihapus');
        }
        redirect('sampah_masuk');
    }




    public function get_harga_by_jenis_sampah($jenis_sampah)
    {
        $harga = $this->M_sampah_masuk->get_harga_by_jenis_sampah($jenis_sampah);
        echo json_encode(['harga_per_kg' => $harga]);
    }

    // Metode untuk mendapatkan subkategori berdasarkan ID kategori
    public function get_subkategori_by_kategori($id_kategori)
    {
        $this->load->model('M_sampah_masuk');
        $subkategori = $this->M_sampah_masuk->get_subkategori_by_kategori($id_kategori);
        echo json_encode($subkategori);
    }
}
