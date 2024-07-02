<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_nasabah extends CI_Model
{
    // $table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
    private $table = 'nasabah';
    // $pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
    private $pk = 'id_nasabah';

    public function GetAllNasabah()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function create()
    {
        $data = [
            "nama_nasabah" => $this->input->post('nama_nasabah', true),
            "no_hp" => $this->input->post('no_hp', true),
            "alamat" => $this->input->post('alamat', true),
        ];

        $this->db->insert($this->table, $data);
    }

    public function getNasabahById($id_nasabah)
    {
        return $this->db->get_where($this->table, [$this->pk => $id_nasabah])->row_array();
    }

    public function delete($id_nasabah)
    {
        $this->db->where($this->pk, $id_nasabah);
        $this->db->delete($this->table);
    }

    public function edit($id_nasabah, $nasabahData)
    {
        $this->db->where($this->pk, $id_nasabah);
        $this->db->update($this->table, $nasabahData);
    }
}
