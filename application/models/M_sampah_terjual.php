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
        return $this->db->insert('sampah_terjual', $data);
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

    public function get_sampah_terjual_count()
    {
        $this->db->from('sampah_terjual');
        return $this->db->count_all_results();
    }

    public function get_harga_data()
    {
        $this->db->select('harga');
        $query = $this->db->get('sampah_terjual');
        return $query->result_array();
    }

    public function getLabels()
    {
        $this->db->select('tgl_terjual');
        $this->db->group_by('tgl_terjual');
        $query = $this->db->get('sampah_terjual');
        return array_column($query->result_array(), 'tgl_terjual');
    }

    public function getData()
    {
        $this->db->select('tgl_terjual, SUM(berat) as total_berat');
        $this->db->group_by('tgl_terjual');
        $query = $this->db->get('sampah_terjual');
        return array_column($query->result_array(), 'total_berat');
    }
    public function getMonthlyData()
    {
        $this->db->select('DATE_FORMAT(tgl_terjual, "%Y-%m") as month, SUM(berat) as total_berat');
        $this->db->group_by('DATE_FORMAT(tgl_terjual, "%Y-%m")');
        $result = $this->db->get('sampah_terjual')->result_array();
        return $result;
    }

    public function getMonthlyLabels()
    {
        $this->db->select('DATE_FORMAT(tgl_terjual, "%Y-%m") as month');
        $this->db->group_by('DATE_FORMAT(tgl_terjual, "%Y-%m")');
        $result = $this->db->get('sampah_terjual')->result_array();
        return array_column($result, 'month');
    }
    public function getTotalHarga()
    {
        $this->db->select_sum('harga');
        $result = $this->db->get('sampah_terjual')->row();
        return $result->harga;
    }

    public function getTotalBerat()
    {
        $this->db->select_sum('berat');
        $result = $this->db->get('sampah_terjual')->row();
        return $result->berat;
    }
    public function get_sampah_terjual_per_kategori()
    {
        $query = $this->db->select('kategori_sampah.nama_kategori, SUM(sampah_terjual.berat) as total_berat')
            ->from('sampah_terjual')
            ->join('kategori_sampah', 'sampah_terjual.id_kategori = kategori_sampah.id_kategori')
            ->group_by('kategori_sampah.nama_kategori')
            ->get();

        $data = [];
        foreach ($query->result() as $row) {
            $data[$row->nama_kategori] = $row->total_berat;
        }

        return $data;
    }
    public function getTotalPendapatanPerBulan()
    {
        $query = $this->db->select('DATE_FORMAT(tgl_terjual, "%Y-%m") as bulan, SUM(harga) as total_pendapatan')
            ->from('sampah_terjual') // Sesuaikan dengan nama tabel transaksi
            ->group_by('MONTH(tgl_terjual)')
            ->get();

        return $query->result_array();
    }
}
