<?php
class Nasabah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_nasabah');
        $this->load->library('form_validation');
        IsLoggedIn();
        IsAdmin();
    }

    public function index()
    {
        $data['title'] = 'Nasabah';
        $data['nasabah'] = $this->M_nasabah->GetAllNasabah();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        // Load views
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

        $this->form_validation->set_rules('id_nasabah', 'ID Nasabah', 'required');
        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Load views
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

        $this->form_validation->set_rules('id_nasabah', 'ID Nasabah', 'required');
        $this->form_validation->set_rules('nama_nasabah', 'Nama Nasabah', 'required');
        $this->form_validation->set_rules('saldo', 'Saldo', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Load views
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_nasabah/edit', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $nasabahData = array(
                'nama_nasabah' => $this->input->post('nama_nasabah'),
                'saldo' => $this->input->post('saldo'),
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

    public function tarik($id_nasabah)
    {
        $data['title'] = 'Transaksi Penarikan';
        $data['nasabah'] = $this->M_nasabah->getNasabahById($id_nasabah);
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->form_validation->set_rules('jumlah_tarik', 'Jumlah Tarik', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Load views
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_nasabah/tarik', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $jumlah_tarik = $this->input->post('jumlah_tarik');

            $saldo_awal = $data['nasabah']['saldo'];

            if ($saldo_awal < $jumlah_tarik) {
                $this->session->set_flashdata('flash', 'Saldo tidak mencukupi.');
                redirect('nasabah/tarik/' . $id_nasabah);
                return;
            }

            // Hitung saldo akhir
            $saldo_akhir = $saldo_awal - $jumlah_tarik;

            // Update saldo nasabah
            $this->M_nasabah->updateSaldo($id_nasabah, $saldo_akhir);

            // Simpan data transaksi tarik saldo (opsional, jika ingin menyimpan log transaksi)
            $data_transaksi = [
                'id_nasabah' => $id_nasabah,
                'jumlah_tarik' => $jumlah_tarik,
                'saldo_awal' => $saldo_awal,
                'saldo_akhir' => $saldo_akhir,
                'tanggal' => date('Y-m-d H:i:s')
            ];
            $this->db->insert('transaksi_tarik_saldo', $data_transaksi);

            $this->session->set_flashdata('flash', 'Penarikan berhasil');
            redirect('nasabah');
        }
    }
}
