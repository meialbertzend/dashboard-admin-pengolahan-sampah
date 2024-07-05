<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function GetAllAdmin()
    {
        // ambil semua data tabel admin
        return $this->db->get('admin')->result_array();
    }

    public function create()
    {
        $data = [
            "id_admin" => $this->input->post('id_admin', true),
            "nama_admin" => $this->input->post('nama_admin', true),
            "pswd_admin" => md5($this->input->post('pswd_admin')),
            "level" => $this->input->post('level', true)
        ];

        $this->db->insert('admin', $data);
    }

    public function getAdminById($id_admin)
    {
        return $this->db->get_where('admin', ['id_admin' => $id_admin])->row_array();
    }

    public function delete($id_admin)
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->delete('admin');
    }

    public function edit($id_admin, $adminData)
    {
        $this->db->where('id_admin', $id_admin);
        $this->db->update('admin', $adminData);
    }
}
