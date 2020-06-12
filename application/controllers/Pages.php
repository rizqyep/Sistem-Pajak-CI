<?php
class Pages extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Rep Page";
        $this->load->view('templates/header', $data);
        $this->load->view('home');
        $this->load->view('templates/footer');
    }
    public function view($page = 'home')
    {
        $data['title'] = "Rep Page";
        $this->load->view('templates/header', $data);
        $this->load->view($page);
        $this->load->view('templates/footer');
    }
}
