<?php

class User extends CI_Controller
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
        $data['judul'] = 'Sistem Pajak - Home';

        if ($this->session->userdata('akses') == '2') {
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view('templates/header', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {

            redirect('login');
        }
    }

    public function listkendaraan()
    {
        $data['judul'] = 'Sistem Pajak - List Kendaraan User';

        if ($this->session->userdata('akses') == '2') {
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['kendaraan_user'] = $this->kendaraan_model->get_kendaraan_user($nama);
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view('templates/header', $data);
            $this->load->view('user/listkendaraan', $data);
            $this->load->view('templates/footer');
        } else {

            redirect('login');
        }
    }

    public function uploadbayar($id)
    {
        $data['judul'] = 'Sistem Pajak - Upload Bukti Pembayaran';

        if ($this->session->userdata('akses') == '2') {
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['kendaraan'] = $this->kendaraan_model->get_kendaraan($id);
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view('templates/header', $data);
            $this->load->view('user/uploadpembayaran', $data);
            $this->load->view('templates/footer');
        } else {

            redirect('login');
        }
    }

    public function updatebukti($id)
    {
        $this->load->model('history_model');
        $kendaraan = $this->kendaraan_model->get_kendaraan($id);
        $nama = $kendaraan['pemilik'];
        $msg_notif = $nama . " telah mengupload bukti pembayaran untuk kendaraan " . $kendaraan['jenis'] . " dengan nomor polisi " . $kendaraan['nopol'];
        $id_kendaraan = $kendaraan['id'];
        $u_kendaraan = $kendaraan['jenis'];
        $nominal = $kendaraan['nominal_pajak'];
        $nopol = $kendaraan['nopol'];
        $this->notif_model->add_notif('admin', $id_kendaraan, $msg_notif);
        $this->kendaraan_model->update_data_bayar($id);
        $this->history_model->insert_history($nama, $u_kendaraan, $nominal, $nopol);
        $this->session->set_flashdata('user_bayar', 'berhasil di upload!');
        redirect(base_url() . "user/listkendaraan");
    }

    public function historybayar()
    {
        $data['judul'] = 'Sistem Pajak - History Pemabayaran';
        $this->load->model('history_model');
        if ($this->session->userdata('akses') == '2') {
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['pembayaran'] = $this->history_model->get_history_user($nama);
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view('templates/header', $data);
            $this->load->view('user/historybayar', $data);
            $this->load->view('templates/footer');
        } else {

            redirect('login');
        }
    }

    public function profil($nama)
    {
        $data['judul'] = 'Sistem Pajak - Profil User';
        $this->load->model('history_model');
        if ($this->session->userdata('akses') == '2') {
            $data['session'] = $this->session->userdata();
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view('templates/header', $data);
            $this->load->view('user/profil', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
    }
}
