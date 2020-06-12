<?php

class Home extends CI_Controller
{
    public function index($pesan = '')
    {
        $data['judul'] = "Sistem Pajak - Home";
        $data['pesan'] = $pesan;
        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
