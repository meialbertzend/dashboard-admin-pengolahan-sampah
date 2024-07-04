<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sampah_terjual extends CI_Model
{
    // $table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
    private $table = 'sampah_terjual';
    // $pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
    private $pk = 'id_sampah_terjual';

    public function GetAllSampahTerjual()
    {
        $this->db->select('sampah_terjual.id_sampah_terjual, sampah_terjual.tgl_terjual, sampah_terjual.berat, sampah_terjual.harga, admin.nama_admin, kategori_sampah.nama_kategori')
            ->from('sampah_terjual')
            ->join('admin', 'admin.id_admin = sampah_terjual.id_admin')
            ->join('kategori_sampah', 'kategori_sampah.id_kategori = sampah_terjual.id_kategori');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function GetAllSampahTerjualSimple()
    {
        return $this->db->get('sampah_terjual')->result_array();
    }

    public function create($data)
    {
        $this->db->insert('sampah_terjual', $data);
    }

    public function getSampahTerjualById($id_sampah_terjual)
    {
        return $this->db->get_where('sampah_terjual', ['id_sampah_terjual' => $id_sampah_terjual])->row_array();
    }

    public function delete($id_sampah_terjual)
    {
        $this->db->where('id_sampah_terjual', $id_sampah_terjual);
        $this->db->delete('sampah_terjual');
    }

    public function edit($id_sampah_terjual, $data)
    {
        $this->db->where('id_sampah_terjual', $id_sampah_terjual);
        $this->db->update('sampah_terjual', $data);
    }

    public function search($keyword)
    {
        $this->db->like('nama_kategori', $keyword);
        $this->db->or_like('tgl_terjual', $keyword);
        $this->db->or_like('berat', $keyword);
        $this->db->or_like('harga', $keyword);
        return $this->db->get('sampah_terjual')->result_array();
    }

    public function get_sampah_terjual_count(){
        $this->db->from('sampah_terjual');
        return $this->db->count_all_results();
    }
}
