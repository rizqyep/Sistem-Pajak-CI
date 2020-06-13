<?php

class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('masuk') != TRUE) {

            redirect('login');
        }
        $this->load->model('notif_model');
        $this->load->model('pegawai_model');
        $this->load->model('kendaraan_model');
    }
    public function index()
    {
        $data['session'] = $this->session->userdata();
        $nama = $this->session->userdata('ses_nama');
        $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
        $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
        $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
        $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
        $nama = $this->session->userdata('ses_nama');
        $data['judul'] = "Sistem Pajak - Pusat Notifikasi";
        $this->load->view('templates/header', $data);
        $this->load->view('notifikasi/index', $data);
        $this->load->view('templates/footer');
        $this->notif_model->mark_all($nama);
    }
}
