<?php
class Kendaraan_model extends CI_model
{
    public function get_all_kendaraan()
    {
        return $this->db->get('kendaraan')->result_array();
    }

    public function get_kendaraan($id)
    {
        return $this->db->get_where('kendaraan', ['id' => $id])->row_array();
    }

    public function get_kendaraan_user($nama)
    {
        $this->db->where('pemilik', $nama);
        $this->db->like('status_bayar', 'Menunggu');
        return $this->db->get('kendaraan')->result_array();
    }

    public function insert_data_kd()
    {
        $data = [
            "pemilik" => $this->input->post('pemilik', true),
            "jenis" => $this->input->post('jenis', true),
            "tenggat" => $this->input->post('tenggat', true),
            "nopol" => $this->input->post('nopol', true),
            "nominal_pajak" => $this->input->post('nominal', true)
        ];
        $this->db->insert('kendaraan', $data);
    }

    public function update_kendaraan($id)
    {
        $data = [
            "jenis" => $this->input->post('jenis', true),
            "tenggat" => $this->input->post('tenggat', true),
            "nopol" => $this->input->post('nopol', true),
            "nominal_pajak" => $this->input->post('nominal', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('kendaraan', $data);
    }

    public function himbau_pembayaran_pajak($id, $status_bayar, $status_pajak)
    {
        $data = [
            'status_bayar' => $status_bayar,
            'status_pajak' => $status_pajak,
        ];
        $this->db->where('id', $id);
        $this->db->update('kendaraan', $data);
    }

    public function get_all_pembayaran()
    {
        $this->db->where('status_bayar', 'Menunggu verifikasi');
        return $this->db->get('kendaraan')->result_array();
    }

    public function get_pembayaran($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('kendaraan')->row_array();
    }

    public function get_history_pembayaran()
    {
        return $this->db->get_where('kendaraan', ['status_bayar' => 'Terverifikasi'])->result_array();
    }
    public function verifikasi_pembayaran($id, $tenggat_baru)
    {
        $data = [
            'status_bayar' => 'Terverifikasi',
            'status_pajak' => 'Aman',
            'tenggat' => $tenggat_baru
        ];
        $this->db->where('id', $id);
        $this->db->update('kendaraan', $data);
    }

    public function get_amount_pembayaran()
    {
        return $this->db->get_where('kendaraan', ['status_bayar' => 'Terverifikasi'])->num_rows();
    }

    public function get_amount_kendaraan()
    {
        return $this->db->get('kendaraan')->num_rows();
    }
    public function get_amount_waitlist()
    {
        return $this->db->get_where('kendaraan', ['status_bayar' => 'Menunggu verifikasi'])->num_rows();
    }


    public function update_data_bayar($id)
    {
        if (!empty($_FILES['bukti']['name'])) {
            $bukti = $this->_uploadImage();
        }

        $data = [
            'bukti_pembayaran' => $bukti,
            'status_bayar' => 'Menunggu verifikasi',
            'status_pajak' => 'Menunggu verifikasi'
        ];
        $this->db->where('id', $id);
        $this->db->update('kendaraan', $data);
    }
    private function _uploadImage()
    {
        $config['upload_path']          = './upload/bukti/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'buktibayar';
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bukti')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}
