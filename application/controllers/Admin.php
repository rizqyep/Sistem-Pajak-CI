<?php

class Admin extends CI_Controller
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
        $data['judul'] = 'Sistem Pajak - Admin Page';
        if ($this->session->userdata('akses') == '1') {
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['jumlah_kendaraan'] = $this->kendaraan_model->get_amount_kendaraan();
            $data['jumlah_bayar'] = $this->kendaraan_model->get_amount_pembayaran();
            $data['jumlah_input'] = $this->kendaraan_model->get_amount_waitlist();
            $data['jumlah_pegawai'] = $this->pegawai_model->get_amount_pegawai();
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $data['kendaraan'] = $this->kendaraan_model->get_all_kendaraan();
            $this->load->view('templates/header', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
    }
    /*
    ================================================================
                        Bagian Fungsi Pegawai
    ================================================================
    */

    public function datapegawai()
    {
        $data['judul'] = 'Sistem Pajak - Data Pegawai Page';
        if ($this->session->userdata('akses') == '1') {
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['user'] = $this->pegawai_model->get_all_pegawai();
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view('templates/header', $data);
            $this->load->view('admin/datapegawai', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('login');
        }
    }

    public function tambahdatapg()
    {
        if ($this->session->userdata('akses') == '1') {
            $data['judul'] = 'Sistem Pajak - Tambah Data Pegawai';
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['user'] = $this->pegawai_model->get_all_pegawai();
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view("templates/header", $data);
            $this->load->view("admin/tambahdatapg");
            $this->load->view("templates/footer");
        } else {
            redirect('login');
        }
    }

    public function insertdatapg()
    {
        $this->pegawai_model->insertdatapg();
        $this->session->set_flashdata('pegawai', 'ditambahkan!');
        redirect('admin/datapegawai');
    }

    public function ubahpegawai($id)
    {
        if ($this->session->userdata('akses') == '1') {
            $data['judul'] = 'Sistem Pajak - Ubah Data Pegawai';
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['user'] = $this->pegawai_model->get_pegawai($id);
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view("templates/header", $data);
            $this->load->view("admin/ubahdatapg", $data);
            $this->load->view("templates/footer");
        } else {
            redirect('login');
        }
    }

    public function updatedatapg($id)
    {

        $this->pegawai_model->update_pegawai($id);
        $this->session->set_flashdata('pegawai', 'diubah!');
        redirect(base_url() . "admin/datapegawai");
    }

    public function detailpegawai($id)
    {
        if ($this->session->userdata('akses') == '1') {
            $data['judul'] = 'Sistem Pajak - Detail Data Pegawai';
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['user'] = $this->pegawai_model->get_pegawai($id);
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view("templates/header", $data);
            $this->load->view("admin/detailpegawai", $data);
            $this->load->view("templates/footer");
        } else {
            redirect('login');
        }
    }

    public function hapuspegawai($id)
    {
        $this->pegawai_model->delete_pegawai($id);
        $this->session->set_flashdata('pegawai', 'dihapus!');
        redirect('admin/datapegawai');
    }

    /*
    ================================================================
                        Bagian Fungsi Kendaraan
    ================================================================
    */

    public function datakendaraan()
    {
        if ($this->session->userdata('akses') == '1') {
            $data['judul'] = 'Sistem Pajak - Data Kendaraan';
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['kendaraan'] = $this->kendaraan_model->get_all_kendaraan();
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view("templates/header", $data);
            $this->load->view("admin/datakendaraan", $data);
            $this->load->view("templates/footer");
        } else {
            redirect('login');
        }
    }

    public function tambahdatakd()
    {
        if ($this->session->userdata('akses') == '1') {
            $data['judul'] = 'Sistem Pajak - Tambah Data Pegawai';
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['user'] = $this->pegawai_model->get_all_pegawai();
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view("templates/header", $data);
            $this->load->view("admin/tambahdatakd", $data);
            $this->load->view("templates/footer");
        } else {
            redirect('login');
        }
    }

    public function insertdatakd()
    {
        $nama = $this->input->post('pemilik', true);
        $current = $this->pegawai_model->get_pegawai_nama($nama);
        $jumlah_kd_sekarang = $current['jumlah_kendaraan'];
        $this->kendaraan_model->insert_data_kd();
        $this->pegawai_model->update_jumlah_kd($nama, $jumlah_kd_sekarang);
        $this->session->set_flashdata('kendaraan', 'ditambahkan!');
        redirect('admin/datakendaraan');
    }

    public function ubahkendaraan($id)
    {
        if ($this->session->userdata('akses') == '1') {
            $data['judul'] = 'Sistem Pajak - Ubah Data Kendaraan';
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['kendaraan'] = $this->kendaraan_model->get_kendaraan($id);
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view("templates/header", $data);
            $this->load->view("admin/ubahdatakd", $data);
            $this->load->view("templates/footer");
        } else {
            redirect('login');
        }
    }

    public function updatedatakd($id)
    {
        $this->kendaraan_model->update_kendaraan($id);
        $this->session->set_flashdata('kendaraan', 'diubah!');
        redirect(base_url() . "admin/datakendaraan");
    }


    public function detailkendaraan($id)
    {
        if ($this->session->userdata('akses') == '1') {
            $data['judul'] = 'Sistem Pajak - Detail Data Kendaraan';
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['kendaraan'] = $this->kendaraan_model->get_kendaraan($id);
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view("templates/header", $data);
            $this->load->view("admin/detailkendaraan", $data);
            $this->load->view("templates/footer");
        } else {
            redirect('login');
            echo "<script>window.location = 'login'</script>";
        }
    }

    public function kirimnotif($id)
    {
        $kendaraan = $this->kendaraan_model->get_kendaraan($id);
        $nama = $kendaraan['pemilik'];
        $msg_notif = "Segera lakukan pembayaran untuk kendaraan " . $kendaraan['jenis'] . " anda dengan nomor polisi " . $kendaraan['nopol'];
        $id_kendaraan = $kendaraan['id'];
        $this->notif_model->add_notif($nama, $id_kendaraan, $msg_notif);
        $this->kendaraan_model->himbau_pembayaran_pajak($id, "Menunggu Pembayaran", "Menunggu Pembayaran");
        $url = base_url() . "admin/detailkendaraan/" . $id;
        $this->session->set_flashdata('notifikasi', 'dikirimkan!');
        redirect($url);
    }
    public function hapuskendaraan($id)
    {
        $this->kendaraan_model->delete_kendaraan($id);
        $this->session->set_flashdata('kendaraan', 'dihapus!');
        redirect('admin/datakendaraan');
    }


    /*
    ============================================================================
                            Bagian Fungsi Pajak
    ============================================================================

    */

    public function pembayaran()
    {
        if ($this->session->userdata('akses') == '1') {
            $data['judul'] = 'Sistem Pajak - List Pembayaran';
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['pembayaran'] = $this->kendaraan_model->get_all_pembayaran();
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view("templates/header", $data);
            $this->load->view("admin/pembayaran", $data);
            $this->load->view("templates/footer");
        } else {
            redirect('login');
        }
    }

    public function detailpembayaran($id)
    {
        if ($this->session->userdata('akses') == '1') {
            $data['judul'] = 'Sistem Pajak - Detail Pembayaran';
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['pembayaran'] = $this->kendaraan_model->get_pembayaran($id);
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view("templates/header", $data);
            $this->load->view("admin/detailpembayaran", $data);
            $this->load->view("templates/footer");
        } else {
            redirect('login');
        }
    }

    public function verifikasi($id)
    {
        $bayar = $this->kendaraan_model->get_pembayaran($id);
        $msg_notif = "Pembayaran untuk kendaraan " . $bayar['jenis'] . " dengan nomor polisi " . $bayar['nopol'] . " telah diverifikasi!";
        $pemilik = $bayar['pemilik'];
        $id_kendaraan = $bayar['id'];
        $tenggat = $bayar['tenggat'];
        $tenggat_baru = date('Y-m-d', strtotime($tenggat . ' +5 year'));
        $this->kendaraan_model->verifikasi_pembayaran($id, $tenggat_baru);
        $this->notif_model->add_notif($pemilik, $id_kendaraan, $msg_notif);
        $this->session->set_flashdata('pembayaran', 'diverifikasi!');
        redirect(base_url() . "admin/pembayaran");
    }

    public function historypembayaran()
    {
        if ($this->session->userdata('akses') == '1') {
            $data['judul'] = 'Sistem Pajak - History Pembayaran';
            $data['session'] = $this->session->userdata();
            $nama = $this->session->userdata('ses_nama');
            $data['jumlah_notif'] = $this->notif_model->get_user_notif_amount($nama)->num_rows();
            $data['notifikasi'] = $this->notif_model->get_user_notif($nama);
            $data['notifikasi_new'] = $this->notif_model->get_user_notif_new($nama);
            $data['pembayaran'] = $this->kendaraan_model->get_history_pembayaran();
            $data['current'] = $this->pegawai_model->get_pegawai_nama($nama);
            $this->load->view("templates/header", $data);
            $this->load->view("admin/historypembayaran", $data);
            $this->load->view("templates/footer");
        } else {
            redirect('login');
        }
    }
}
