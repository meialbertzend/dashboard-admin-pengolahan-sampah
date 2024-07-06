<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->library('form_validation');
        $this->load->helper('islogin'); // Tambahkan ini
        IsLoggedIn(); // Cek apakah pengguna sudah login
        IsAdmin(); // Cek apakah pengguna adalah administrator
    }

    public function index()
    {
        if ($this->session->userdata('level') != 'administrator') {
            redirect('auth', 'refresh'); // Redirect jika bukan administrator
        }
        // Tangkap data
        $data['title'] = 'Admin';
        $data['admin'] = $this->M_admin->GetAllAdmin();
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar', $data);
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('backend/v_admin/read', $data);
        $this->load->view('backend/templates/footer', $data);
    }

    public function create()
    {
        // Pemeriksaan apakah admin atau administrator
        if ($this->session->userdata('level') != 'administrator') {
            redirect('auth', 'refresh'); // Redirect jika bukan administrator
        }
        $data['title'] = 'Tambah Data Admin';
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->form_validation->set_rules('id_admin', 'Username', 'required');
        $this->form_validation->set_rules('nama_admin', 'Nama', 'required');
        $this->form_validation->set_rules('pswd_admin', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_admin/create', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $this->M_admin->create();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('admin');
        }
    }

    public function edit($id_admin)
    {
        // Pemeriksaan apakah admin atau administrator
        if ($this->session->userdata('level') != 'administrator') {
            redirect('auth', 'refresh'); // Redirect jika bukan administrator
        }
        $data['title'] = 'Edit Data Admin';
        $data['admin'] = $this->M_admin->getAdminById($id_admin);
        $data['namaAdmin'] = $this->db->get_where('admin', ['id_admin' => $this->session->userdata('id_admin')])->row_array();

        $this->form_validation->set_rules('id_admin', 'Username', 'required');
        $this->form_validation->set_rules('nama_admin', 'Nama', 'required');
        $this->form_validation->set_rules('pswd_admin', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('backend/templates/header', $data);
            $this->load->view('backend/templates/sidebar', $data);
            $this->load->view('backend/templates/topbar', $data);
            $this->load->view('backend/v_admin/edit', $data);
            $this->load->view('backend/templates/footer');
        } else {
            $adminData = array(
                'id_admin' => $this->input->post('id_admin'),
                'nama_admin' => $this->input->post('nama_admin'),
                'pswd_admin' => md5($this->input->post('pswd_admin')),
                'level' => $this->input->post('level')
            );

            $this->M_admin->edit($id_admin, $adminData);

            // Update session if the logged-in admin is the one being edited
            if ($id_admin == $this->session->userdata('id_admin')) {
                $this->session->set_userdata('nama_admin', $this->input->post('nama_admin'));
            }

            $this->session->set_flashdata('flash', 'Diubah');
            redirect('admin');
        }
    }

    public function delete($id_admin)
    {
        // Pemeriksaan apakah admin atau administrator
        if ($this->session->userdata('level') != 'administrator') {
            redirect('auth', 'refresh'); // Redirect jika bukan administrator
        }

        $this->M_admin->delete($id_admin);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin');
    }
}
