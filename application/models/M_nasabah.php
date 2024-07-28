<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_nasabah extends CI_Model
{
    private $table = 'nasabah';
    private $pk = 'id_nasabah';

    public function __construct()
    {
        parent::__construct();
    }

    // Mendapatkan semua data nasabah
    public function GetAllNasabah()
    {
        return $this->db->get($this->table)->result_array();
    }

    // Menambahkan data nasabah ke dalam database
    public function create()
    {
        $data = [
            "id_nasabah" => $this->input->post('id_nasabah', true),
            "nama_nasabah" => $this->input->post('nama_nasabah', true),
            "no_hp" => $this->input->post('no_hp', true),
            "alamat" => $this->input->post('alamat', true),
            "saldo" => 0 // saldo awal 0
        ];

        return $this->db->insert($this->table, $data);
    }

    // Mendapatkan data nasabah berdasarkan ID
    public function getNasabahById($id_nasabah)
    {
        $this->db->from($this->table);
        $this->db->where($this->pk, $id_nasabah);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Menghapus data nasabah berdasarkan ID
    public function delete($id_nasabah)
    {
        $this->db->where($this->pk, $id_nasabah);
        return $this->db->delete($this->table);
    }

    // Memperbarui data nasabah berdasarkan ID
    public function edit($id_nasabah, $nasabahData)
    {
        $this->db->where($this->pk, $id_nasabah);
        return $this->db->update($this->table, $nasabahData);
    }

    // Mendapatkan jumlah total nasabah
    public function get_nasabah_count()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Mendapatkan total harga sampah nasabah berdasarkan ID
    public function getTotalHargaNasabah($id_nasabah)
    {
        $this->db->select_sum('harga');
        $this->db->where('id_nasabah', $id_nasabah);
        $query = $this->db->get('sampah_masuk');
        return $query->row()->harga;
    }

    // Mendapatkan saldo nasabah berdasarkan ID
    public function getSaldoNasabah($id_nasabah)
    {
        $this->db->select('saldo');
        $this->db->from($this->table);
        $this->db->where($this->pk, $id_nasabah);
        $query = $this->db->get();
        $result = $query->row_array();

        // Debugging: Pastikan saldo diambil dengan benar
        if ($result) {
            log_message('debug', 'Saldo saat ini untuk ID Nasabah ' . $id_nasabah . ': ' . $result['saldo']);
        } else {
            log_message('error', 'ID Nasabah tidak ditemukan: ' . $id_nasabah);
        }

        return $result;
    }

    // Memperbarui saldo nasabah berdasarkan ID
    public function updateSaldo($id_nasabah, $saldo_baru)
    {
        // Mulai transaksi database
        $this->db->trans_start();

        // Update saldo di tabel nasabah
        $this->db->where($this->pk, $id_nasabah);
        $this->db->update($this->table, ['saldo' => $saldo_baru]);

        // Commit transaksi
        $this->db->trans_complete();

        // Cek status transaksi
        if ($this->db->trans_status() === FALSE) {
            log_message('error', 'Gagal memperbarui saldo untuk ID Nasabah: ' . $id_nasabah);
            return false; // Jika transaksi gagal
        }

        // Return saldo terbaru
        return $saldo_baru;
    }
}
