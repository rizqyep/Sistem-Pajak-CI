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
        if (!empty($_FILES['foto']['name'])) {
            $foto = $this->_uploadImage();
        }

        $data = [

            "nama" => $this->input->post('nama', true),
            "foto" => $foto,
            "username" => $this->input->post('username', true),
            "nip" => $this->input->post('nip', true),
            "unit" => $this->input->post('unit', true),
            "jabatan" => $this->input->post('jabatan', true),
            "pendidikan" => $this->input->post('pendidikan', true),
            "telp" => $this->input->post('telp', true),
            "agama" => $this->input->post('agama', true),
            "tanggal_lahir" => $this->input->post('lahir', true),
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
            "unit" => $this->input->post('unit', true),
            "jabatan" => $this->input->post('jabatan', true),
            "pendidikan" => $this->input->post('pendidikan', true),
            "telp" => $this->input->post('telp', true),
            "agama" => $this->input->post('agama', true),
            "tanggal_lahir" => $this->input->post('lahir', true),
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
    private function _uploadImage()
    {
        $config['upload_path']          = './upload/user/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = "foto_user";
        $config['overwrite']            = true;
        $config['max_size']             = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}
