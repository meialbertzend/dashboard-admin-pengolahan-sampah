<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Memastikan semua model yang dibutuhkan di-load
        $this->load->model('M_nasabah');
        $this->load->model('M_kategori');
        $this->load->model('M_sampah_masuk');
        $this->load->model('M_sampah_terjual');
    }

    public function index()
    {
        // Mengambil data counts
        $counts = $this->getCounts();
        $data = array_merge([], $counts);

        // Mengambil data bulanan
        $monthlyData = $this->getMonthlyData();
        $data = array_merge($data, $monthlyData);

        $this->load->view('backend/landing', $data);
    }

    private function getCounts()
    {
        return [
            'nasabah_count' => $this->M_nasabah->get_nasabah_count(),
            'kategori_count' => $this->M_kategori->get_kategori_count(),
            'sampah_masuk_count' => $this->M_sampah_masuk->getTotalMasuk(),
            'sampah_terjual_count' => $this->M_sampah_terjual->getTotalBerat(),
            'pendapatan_count' => $this->M_sampah_terjual->getTotalHarga()
        ];
    }

    private function getMonthlyData()
    {
        $labels_masuk = $this->M_sampah_masuk->getMonthlyLabels();
        $data_masuk = $this->M_sampah_masuk->getMonthlyData();
        $labels_terjual = $this->M_sampah_terjual->getMonthlyLabels();
        $data_terjual = $this->M_sampah_terjual->getMonthlyData();

        $labels = array_unique(array_merge($labels_masuk, $labels_terjual));
        sort($labels);

        $data_masuk_map = $this->mapData($data_masuk);
        $data_terjual_map = $this->mapData($data_terjual);

        $sampah_masuk_data = $this->prepareChartData($labels, $data_masuk_map);
        $sampah_terjual_data = $this->prepareChartData($labels, $data_terjual_map);

        return [
            'labels' => $labels,
            'sampah_masuk_data' => $sampah_masuk_data,
            'sampah_terjual_data' => $sampah_terjual_data
        ];
    }

    private function mapData($data)
    {
        $mapped_data = [];
        foreach ($data as $item) {
            $mapped_data[$item['month']] = $item['total_berat'];
        }
        return $mapped_data;
    }

    private function prepareChartData($labels, $data_map)
    {
        $chart_data = [];
        foreach ($labels as $label) {
            $chart_data[] = $data_map[$label] ?? 0;
        }
        return $chart_data;
    }
}
