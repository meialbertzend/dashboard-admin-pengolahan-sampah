<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_tarik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tarik');
        $this->load->model('M_nasabah');
        $this->load->library('form_validation');
        IsLoggedIn();
    }

    public function index()
    {
        $data['title'] = 'Data Transaksi Tarik';
        $data['transaksi_tarik'] = $this->M_tarik->getAll(); // Pastikan getAll() ada di model M_tarik
        $data['transaksi_tarik'] = $this->M_tarik->getAllTransaksiTarik();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/v_tarik/read', $data); // Pastikan file ini ada
        $this->load->view('backend/templates/footer');
    }

    public function create()
    {
        // Validasi form
        $this->form_validation->set_rules('tgl_tarik', 'Tanggal Tarik', 'required');
        $this->form_validation->set_rules('id_nasabah', 'ID Nasabah', 'required');
        $this->form_validation->set_rules('jumlah_tarik', 'Jumlah Tarik', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Load view jika validasi gagal
            $data['title'] = 'Tambah Transaksi Tarik';
            $data['nasabah'] = $this->M_nasabah->GetAllNasabah();
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_tarik/create', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $tgl_tarik = $this->input->post('tgl_tarik');
            $id_nasabah = $this->input->post('id_nasabah');
            $jumlah_tarik = $this->input->post('jumlah_tarik');

            // Mulai transaksi database
            $this->db->trans_start();

            // Mengambil saldo awal
            $nasabah = $this->M_nasabah->getNasabahById($id_nasabah);
            $saldo_awal = $nasabah['saldo'];

            // Mengurangi saldo dengan jumlah penarikan
            $saldo_akhir = $saldo_awal - $jumlah_tarik;

            if ($saldo_akhir < 0) {
                // Jika saldo tidak mencukupi
                $this->db->trans_rollback();
                $this->session->set_flashdata('error', 'Saldo tidak mencukupi atau nasabah tidak ditemukan');
                redirect('transaksi_tarik/create');
            } else {
                // Menambahkan data penarikan ke tabel tarik
                $tarikData = [
                    'tgl_tarik' => $tgl_tarik,
                    'id_nasabah' => $id_nasabah,
                    'saldo_awal' => $saldo_awal,
                    'jumlah_tarik' => $jumlah_tarik,
                    'saldo_akhir' => $saldo_akhir,
                    'id_admin' => $this->session->userdata('id_admin')
                ];

                $this->M_tarik->create($tarikData);

                // Memperbarui saldo nasabah
                $this->M_nasabah->updateSaldo($id_nasabah, $saldo_akhir);

                // Menyelesaikan transaksi
                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                    // Jika transaksi gagal, rollback dan tampilkan pesan kesalahan
                    $this->db->trans_rollback();
                    $this->session->set_flashdata('error', 'Transaksi tarik gagal');
                    redirect('transaksi_tarik/create');
                } else {
                    // Jika transaksi berhasil, tampilkan pesan sukses
                    $this->db->trans_commit();
                    $this->session->set_flashdata('success', 'Transaksi tarik berhasil ditambahkan');
                    redirect('transaksi_tarik');
                }
            }
        }
    }



    public function edit($id_tarik)
    {
        $data['title'] = 'Edit Transaksi Tarik';
        $data['tarik'] = $this->M_tarik->getById($id_tarik); // Pastikan getById() ada di model M_tarik
        $data['nasabah'] = $this->M_nasabah->GetAllNasabah(); // Pastikan GetAllNasabah() ada di model M_nasabah
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->form_validation->set_rules('tgl_tarik', 'Tanggal Tarik', 'required');
        $this->form_validation->set_rules('id_nasabah', 'ID Nasabah', 'required');
        $this->form_validation->set_rules('jumlah_tarik', 'Jumlah Tarik', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_tarik/edit', $data); // Pastikan file ini ada
            $this->load->view('backend/templates/footer');
        } else {
            $id_nasabah = $this->input->post('id_nasabah');
            $jumlah_tarik = $this->input->post('jumlah_tarik');

            // Mendapatkan saldo awal dari nasabah
            $tarik = $this->M_tarik->getById($id_tarik);
            $saldo_awal = $tarik['saldo_awal'];
            $saldo_akhir = $saldo_awal - $jumlah_tarik;

            if ($saldo_akhir < 0) {
                $this->session->set_flashdata('flash', 'Saldo tidak mencukupi');
                redirect('transaksi_tarik/edit/' . $id_tarik);
            }

            $tarikData = [
                'tgl_tarik' => $this->input->post('tgl_tarik'),
                'id_nasabah' => $id_nasabah,
                'saldo_awal' => $saldo_awal,
                'jumlah_tarik' => $jumlah_tarik,
                'saldo_akhir' => $saldo_akhir,
                'id_admin' => $this->session->userdata('id_admin')
            ];

            $this->M_tarik->update($id_tarik, $tarikData); // Pastikan update() ada di model M_tarik
            $this->M_nasabah->updateSaldo($id_nasabah, $saldo_akhir); // Pastikan updateSaldo() ada di model M_nasabah

            $this->session->set_flashdata('flash', 'Diubah');
            redirect('transaksi_tarik');
        }
    }


    public function delete($id_tarik)
    {
        $tarik = $this->M_tarik->getById($id_tarik); // Pastikan getById() ada di model M_tarik
        if ($tarik) {
            $id_nasabah = $tarik['id_nasabah'];
            $jumlah_tarik = $tarik['jumlah_tarik'];

            $nasabah = $this->M_nasabah->getNasabahById($id_nasabah); // Pastikan getNasabahById() ada di model M_nasabah
            $saldo_awal = $nasabah['saldo'];
            $saldo_akhir = $saldo_awal + $jumlah_tarik;

            $this->M_tarik->delete($id_tarik); // Pastikan delete() ada di model M_tarik
            $this->M_nasabah->updateSaldo($id_nasabah, $saldo_akhir); // Pastikan updateSaldo() ada di model M_nasabah

            $this->session->set_flashdata('flash', 'Dihapus');
        } else {
            $this->session->set_flashdata('flash', 'Transaksi tidak ditemukan');
        }
        redirect('transaksi_tarik');
    }
}
