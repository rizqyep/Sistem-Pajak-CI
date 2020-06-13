<?php

class Pegawai_model extends CI_model
{

    public function get_all_pegawai()
    {
        return $this->db->get('user')->result_array();
    }
    public function insertdatapg()
    {
        $password = $this->input->post('password', true);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            "nama" => $this->input->post('nama', true),
            "username" => $this->input->post('username', true),
            "nip" => $this->input->post('nip', true),
            "password" => $password,
        ];
        $this->db->insert('user', $data);
    }

    public function update_pegawai($id)
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "username" => $this->input->post('username', true),
            "nip" => $this->input->post('nip', true),
            "jumlah_kendaraan" => $this->input->post('jumlah_kd', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function get_pegawai($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
    public function get_pegawai_nama($nama)
    {
        return $this->db->get_where('user', ['nama' => $nama])->row_array();
    }
    public function update_jumlah_kd($nama, $jumlah_kd_sekarang)
    {
        $jumlah_kd_update = $jumlah_kd_sekarang + 1;
        $data = [
            'jumlah_kendaraan' => $jumlah_kd_update
        ];
        $this->db->where('nama', $nama);
        $this->db->update('user', $data);
    }
    public function delete_pegawai($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function get_amount_pegawai()
    {
        return $this->db->get('user')->num_rows();
    }
}
