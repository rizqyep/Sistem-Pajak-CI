<?php

class History_model extends CI_model
{
    public function insert_history($nama, $u_kendaraan, $nominal, $nopol)
    {
        $data = [
            'pemilik' => $nama,
            'kendaraan' => $u_kendaraan,
            'nopol' => $nopol,
            'nominal_pajak' => $nominal
        ];
        $this->db->insert('historybayar', $data);
    }

    public function get_history_user($nama)
    {
        return $this->db->get_where('historybayar', ['pemilik' => $nama])->result_array();
    }
}
