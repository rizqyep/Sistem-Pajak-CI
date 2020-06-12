<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }
    public function index()
    {
        $this->load->view('login/index');
    }

    function auth()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $cek_admin = $this->login_model->auth_admin();
        $cek_user = $this->login_model->auth_user($username);
        if ($cek_admin->num_rows() == 1) { //jika login sebagai admin
            $data = $cek_admin->row_array();
            if (password_verify($password, $data['password'])) {
                $this->session->set_userdata('masuk', TRUE);
                $this->session->set_userdata('akses', '1');
                $this->session->set_userdata('ses_nama', $data['nama']);
                redirect('admin');
            }
        }
        if ($cek_user->num_rows() == 1) { //jika login sebagai user biasa
            $data_user = $cek_user->row_array();
            if (password_verify($password, $data_user['password'])) {
                $this->session->set_userdata('masuk', TRUE);
                $this->session->set_userdata('akses', '2');
                $this->session->set_userdata('ses_nama', $data_user['nama']);
                redirect('user');
            } else {
                $this->session->set_flashdata('msg', 'Username atau password salah');
                redirect('login');
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $url = 'login';
        redirect($url);
    }
}
