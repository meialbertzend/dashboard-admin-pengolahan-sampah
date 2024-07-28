<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_kategori extends CI_Model
{
    private $table = 'kategori_sampah';
    private $pk = 'id_kategori';

    public function GetAllKategori() // Ubah di sini
    {
        return $this->db->get($this->table)->result_array();
    }

    public function create()
    {
        $data = [
            "nama_kategori" => $this->input->post('nama_kategori', true),
            "deskripsi" => $this->input->post('deskripsi', true),
        ];

        $this->db->insert($this->table, $data);
    }

    public function getKategoriById($id_kategori)
    {
        return $this->db->get_where($this->table, [$this->pk => $id_kategori])->row_array();
    }

    public function delete($id_kategori)
    {
        $this->db->where($this->pk, $id_kategori);
        $this->db->delete($this->table);
    }

    public function edit($id_kategori)
    {
        $data = [
            "nama_kategori" => $this->input->post('nama_kategori', true),
            "deskripsi" => $this->input->post('deskripsi', true),
        ];

        $this->db->where($this->pk, $id_kategori);
        $this->db->update($this->table, $data);
    }

    public function get_kategori_count()
    {
        $this->db->from('kategori_sampah');
        return $this->db->count_all_results();
    }
}
