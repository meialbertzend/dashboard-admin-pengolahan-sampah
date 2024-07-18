<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    private $redirect = "admin";

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('M_auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->session->sess_destroy();
        $data = array(
            'login' => ''
        );

        $this->form_validation->set_rules('id_admin', 'ID Admin', 'required');
        $this->form_validation->set_rules('pswd_admin', 'Password Admin', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Masuk';
            $this->load->view('backend/templates/auth_header', $data);
            $this->load->view('backend/login', $data);
            $this->load->view('backend/templates/auth_footer');
        } else {
            // Jika validasi sukses
            $this->login();
        }
    }

    public function login()
    {
        $kd = $this->input->post('id_admin');
        $pwd = md5($this->input->post('pswd_admin'));
        $data = $this->M_auth->CekLogin('admin', 'id_admin', $kd);

        // Jika data pengguna ditemukan dan login berhasil
        if ($data && $data['pswd_admin'] == $pwd && $data['id_admin'] == $kd) {
            $array = array(
                'id_admin' => $data['id_admin'],
                'nama_admin' => $data['nama_admin'],
                'level' => $data['level'] // Tambahkan level admin ke session
            );
            $this->session->set_userdata($array);
            redirect('Home', 'refresh');
        } else {
            // Jika login gagal
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('Auth', 'refresh');
        }
    }

    public function logout()
    {
        // Data session akan dihancurkan
        $this->session->sess_destroy();
        redirect('Landing', 'refresh');
    }
}
