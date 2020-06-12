<?php

class Notif_model extends CI_model
{

    public function get_user_notif_amount($nama)
    {

        return $this->db->get_where('notifikasi', ['pemilik' => $nama, 'marked' => 'Belum']);
    }
    public function get_user_notif($nama)
    {
        $this->db->order_by('waktu', 'DESC');
        return $this->db->get_where('notifikasi', ['pemilik' => $nama])->result_array();
    }
    public function get_user_notif_new($nama)
    {
        $this->db->order_by('waktu', 'DESC');

        return $this->db->get_where('notifikasi', ['pemilik' => $nama, 'marked' => 'Belum'])->result_array();
    }

    public function add_notif($nama, $id_kendaraan, $msg_notif)
    {
        $waktu = date("Y-m-d H:i:s");
        $data = [
            'isi' => $msg_notif,
            'id_kendaraan' => $id_kendaraan,
            'pemilik' => $nama,
            'waktu' => $waktu
        ];
        $this->db->insert('notifikasi', $data);
    }

    public function mark_all($nama)
    {
        $data = [
            'marked' => 'Sudah'
        ];
        $this->db->where('pemilik', $nama);
        $this->db->update('notifikasi', $data);
    }
}
