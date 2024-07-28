<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sampah_masuk extends CI_Model
{
    private $table = 'sampah_masuk';
    private $pk = 'id_sampah_masuk';

    // Mengambil semua data sampah masuk dengan kategori dan subkategori
    public function GetAllSampahMasuk()
    {
        $this->db->select('sampah_masuk.*, admin.nama_admin, nasabah.nama_nasabah, kategori_sampah.nama_kategori, subkategori_sampah.jenis_sampah');
        $this->db->from('sampah_masuk');
        $this->db->join('admin', 'admin.id_admin = sampah_masuk.id_admin');
        $this->db->join('nasabah', 'nasabah.id_nasabah = sampah_masuk.id_nasabah');
        $this->db->join('kategori_sampah', 'kategori_sampah.id_kategori = sampah_masuk.id_kategori');
        $this->db->join('subkategori_sampah', 'subkategori_sampah.id_subkategori = sampah_masuk.id_subkategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Mengambil semua sampah masuk tanpa join
    public function GetAllSampahMasukSimple()
    {
        return $this->db->get('sampah_masuk')->result_array();
    }

    // Menambahkan data sampah masuk
    public function create($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Mengambil data sampah masuk berdasarkan ID
    public function getSampahMasukById($id_sampah_masuk)
    {
        return $this->db->get_where('sampah_masuk', ['id_sampah_masuk' => $id_sampah_masuk])->row_array();
    }

    // Menghapus data sampah masuk berdasarkan ID
    public function delete($id_sampah_masuk)
    {
        $this->db->where('id_sampah_masuk', $id_sampah_masuk);
        $this->db->delete('sampah_masuk');
    }

    // Mengupdate data sampah masuk berdasarkan ID
    public function edit($id_sampah_masuk, $data)
    {
        $this->db->where('id_sampah_masuk', $id_sampah_masuk);
        $this->db->update('sampah_masuk', $data);
    }

    // Mencari data sampah masuk berdasarkan keyword
    public function search($keyword)
    {
        $this->db->like('nasabah.nama_nasabah', $keyword);
        $this->db->or_like('kategori_sampah.nama_kategori', $keyword);
        $this->db->or_like('sampah_masuk.tgl_pengumpulan', $keyword);
        $this->db->or_like('sampah_masuk.berat', $keyword);
        $this->db->join('nasabah', 'nasabah.id_nasabah = sampah_masuk.id_nasabah');
        $this->db->join('kategori_sampah', 'sampah_masuk.id_kategori = kategori_sampah.id_kategori');
        return $this->db->get('sampah_masuk')->result_array();
    }

    // Menghitung total jumlah sampah masuk
    public function get_sampah_masuk_count()
    {
        $this->db->from('sampah_masuk');
        return $this->db->count_all_results();
    }

    // Mendapatkan label untuk grafik
    public function getLabels()
    {
        $this->db->select('DATE(tgl_pengumpulan) as date');
        $this->db->group_by('DATE(tgl_pengumpulan)');
        $result = $this->db->get('sampah_masuk')->result_array();
        return array_column($result, 'date');
    }

    // Mendapatkan data untuk grafik
    public function getData()
    {
        $this->db->select('SUM(berat) as total_berat, DATE(tgl_pengumpulan) as date');
        $this->db->group_by('DATE(tgl_pengumpulan)');
        $result = $this->db->get('sampah_masuk')->result_array();
        return array_column($result, 'total_berat');
    }

    // Mendapatkan total berat sampah masuk
    public function getTotalMasuk()
    {
        $this->db->select_sum('berat');
        $result = $this->db->get('sampah_masuk')->row();
        return $result->berat;
    }

    // Mendapatkan data bulanan untuk grafik
    public function getMonthlyData()
    {
        $this->db->select('DATE_FORMAT(tgl_pengumpulan, "%Y-%m") as month, SUM(berat) as total_berat');
        $this->db->group_by('DATE_FORMAT(tgl_pengumpulan, "%Y-%m")');
        $result = $this->db->get('sampah_masuk')->result_array();
        return $result;
    }

    // Mendapatkan label bulanan untuk grafik
    public function getMonthlyLabels()
    {
        $this->db->select('DATE_FORMAT(tgl_pengumpulan, "%Y-%m") as month');
        $this->db->group_by('DATE_FORMAT(tgl_pengumpulan, "%Y-%m")');
        $result = $this->db->get('sampah_masuk')->result_array();
        return array_column($result, 'month');
    }

    // Mendapatkan total berat sampah per kategori
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

    // Mendapatkan harga berdasarkan jenis sampah
    public function get_harga_by_jenis_sampah($jenis_sampah)
    {
        $this->db->select('harga');
        $this->db->where('jenis_sampah', $jenis_sampah);
        $result = $this->db->get('subkategori_sampah')->row_array();
        return isset($result['harga']) ? $result['harga'] : null;
    }

    // Mendapatkan subkategori berdasarkan ID kategori
    public function get_subkategori_by_kategori($id_kategori)
    {
        $this->db->select('id_subkategori, jenis_sampah, harga');
        $this->db->from('subkategori_sampah');
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Menghitung total harga berdasarkan jenis sampah dan berat
    public function calculateTotalHarga($jenis_sampah, $berat)
    {
        $this->db->select('harga');
        $this->db->where('jenis_sampah', $jenis_sampah);
        $result = $this->db->get('subkategori_sampah')->row_array();
        if (isset($result['harga'])) {
            return $result['harga'] * $berat;
        }
        return NULL;
    }

    public function get_harga_by_id_subkategori($id_subkategori)
    {
        $this->db->select('harga');
        $this->db->where('id_subkategori', $id_subkategori);
        $result = $this->db->get('subkategori_sampah')->row_array();
        return isset($result['harga']) ? $result['harga'] : null;
    }
    public function updateNasabahBalance($id_nasabah, $total_harga)
    {
        // Ambil saldo saat ini
        $this->db->select('saldo');
        $this->db->where('id_nasabah', $id_nasabah);
        $nasabah = $this->db->get('nasabah')->row_array();
        $saldo_sekarang = isset($nasabah['saldo']) ? $nasabah['saldo'] : 0;

        // Tambahkan harga total ke saldo
        $new_saldo = $saldo_sekarang + $total_harga;

        // Update saldo di database
        $this->db->where('id_nasabah', $id_nasabah);
        $this->db->update('nasabah', ['saldo' => $new_saldo]);
    }
}
