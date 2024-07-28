<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tarik extends CI_Model
{
    private $table = 'tarik';
    private $pk = 'id_tarik';

    public function __construct()
    {
        parent::__construct();
    }


    // Menambahkan data penarikan ke dalam database
    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Mengupdate data penarikan berdasarkan ID
    public function update($id_tarik, $data)
    {
        $this->db->where($this->pk, $id_tarik);
        return $this->db->update($this->table, $data);
    }

    // Menghapus data penarikan berdasarkan ID
    public function delete($id_tarik)
    {
        $this->db->where($this->pk, $id_tarik);
        return $this->db->delete($this->table);
    }

    // Mendapatkan data penarikan berdasarkan ID
    public function getById($id_tarik)
    {
        $this->db->from($this->table);
        $this->db->where($this->pk, $id_tarik);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Mendapatkan semua data penarikan
    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }
    // Mendapatkan semua data penarikan dengan detail nasabah dan admin
    public function getAllTransaksiTarik()
    {
        $this->db->select('tarik.*, nasabah.nama_nasabah, admin.nama_admin');
        $this->db->from($this->table);
        $this->db->join('nasabah', 'nasabah.id_nasabah = tarik.id_nasabah');
        $this->db->join('admin', 'admin.id_admin = tarik.id_admin');
        $query = $this->db->get();
        return $query->result_array();
    }
}
