<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sampah_masuk extends CI_Model
{
    private $table = 'sampah_masuk';
    private $pk = 'id_sampah_masuk';

    public function GetAllSampahMasuk()
    {
        $this->db->select('sampah_masuk.id_sampah_masuk, sampah_masuk.tgl_pengumpulan, sampah_masuk.berat, admin.nama_admin, nasabah.nama_nasabah, kategori_sampah.nama_kategori')
            ->from('sampah_masuk')
            ->join('admin', 'admin.id_admin = sampah_masuk.id_admin')
            ->join('nasabah', 'nasabah.id_nasabah = sampah_masuk.id_nasabah')
            ->join('kategori_sampah', 'kategori_sampah.id_kategori = sampah_masuk.id_kategori');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function GetAllSampahMasukSimple()
    {
        return $this->db->get('sampah_masuk')->result_array();
    }

    public function create($data)
    {
        $this->db->insert('sampah_masuk', $data);
    }

    public function getSampahMasukById($id_sampah_masuk)
    {
        return $this->db->get_where('sampah_masuk', ['id_sampah_masuk' => $id_sampah_masuk])->row_array();
    }

    public function delete($id_sampah_masuk)
    {
        $this->db->where('id_sampah_masuk', $id_sampah_masuk);
        $this->db->delete('sampah_masuk');
    }

    public function edit($id_sampah_masuk, $data)
    {
        $this->db->where('id_sampah_masuk', $id_sampah_masuk);
        $this->db->update('sampah_masuk', $data);
    }

    public function search($keyword)
    {
        $this->db->like('nama_nasabah', $keyword);
        $this->db->or_like('nama_kategori', $keyword);
        $this->db->or_like('tgl_pengumpulan', $keyword);
        $this->db->or_like('berat', $keyword);
        return $this->db->get('sampah_masuk')->result_array();
    }

    public function get_sampah_masuk_count()
    {
        $this->db->from('sampah_masuk');
        return $this->db->count_all_results();
    }

    public function getLabels()
    {
        $this->db->select('DATE(tgl_pengumpulan) as date');
        $this->db->group_by('DATE(tgl_pengumpulan)');
        $result = $this->db->get('sampah_masuk')->result_array();
        return array_column($result, 'date');
    }

    public function getData()
    {
        $this->db->select('SUM(berat) as total_berat, DATE(tgl_pengumpulan) as date');
        $this->db->group_by('DATE(tgl_pengumpulan)');
        $result = $this->db->get('sampah_masuk')->result_array();
        return array_column($result, 'total_berat');
    }

    public function getTotalMasuk()
    {
        $this->db->select_sum('berat');
        $result = $this->db->get('sampah_masuk')->row();
        return $result->berat;
    }
    public function getMonthlyData()
    {
        $this->db->select('DATE_FORMAT(tgl_pengumpulan, "%Y-%m") as month, SUM(berat) as total_berat');
        $this->db->group_by('DATE_FORMAT(tgl_pengumpulan, "%Y-%m")');
        $result = $this->db->get('sampah_masuk')->result_array();
        return $result;
    }

    public function getMonthlyLabels()
    {
        $this->db->select('DATE_FORMAT(tgl_pengumpulan, "%Y-%m") as month');
        $this->db->group_by('DATE_FORMAT(tgl_pengumpulan, "%Y-%m")');
        $result = $this->db->get('sampah_masuk')->result_array();
        return array_column($result, 'month');
    }
    public function get_sampah_masuk_per_kategori()
    {
        $query = $this->db->select('kategori_sampah.nama_kategori, SUM(sampah_masuk.berat) as total_berat')
            ->from('sampah_masuk')
            ->join('kategori_sampah', 'sampah_masuk.id_kategori = kategori_sampah.id_kategori')
            ->group_by('kategori_sampah.nama_kategori')
            ->get();

        $data = [];
        foreach ($query->result() as $row) {
            $data[$row->nama_kategori] = $row->total_berat;
        }

        return $data;
    }
}
