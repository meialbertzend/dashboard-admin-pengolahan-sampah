<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_subkategori extends CI_Model
{
    public function get_all_subkategori()
    {
        $this->db->select('subkategori_sampah.*, kategori_sampah.nama_kategori');
        $this->db->from('subkategori_sampah');
        $this->db->join('kategori_sampah', 'subkategori_sampah.id_kategori = kategori_sampah.id_kategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_subkategori($data)
    {
        return $this->db->insert('subkategori_sampah', $data);
    }

    public function get_subkategori_by_id($id_subkategori)
    {
        $this->db->where('id_subkategori', $id_subkategori);
        $query = $this->db->get('subkategori_sampah');
        return $query->row_array();
    }

    public function update_subkategori($id_subkategori, $data)
    {
        $this->db->where('id_subkategori', $id_subkategori);
        return $this->db->update('subkategori_sampah', $data);
    }

    public function delete_subkategori($id_subkategori)
    {
        $this->db->where('id_subkategori', $id_subkategori);
        return $this->db->delete('subkategori_sampah');
    }

    public function get_subkategori_by_kategori($id_kategori)
    {
        $this->db->select('jenis_sampah, harga');
        $this->db->from('subkategori_sampah');
        $this->db->where('id_kategori', $id_kategori);
        $result = $this->db->get()->result_array();
        return $result;
    }
}
