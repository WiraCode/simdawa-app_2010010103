<?php

class LoginModel extends CI_Model
{

    private $table = "pengguna";

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $cek = $this->db->get_where($this->table, ['username' => $username, 'password' => $password]);

        if ($cek->num_rows() > 0) {
            $data_login = $cek->row();
            $data_pengguna = $this->db->get_where('pendaftaran_pengguna', ['id' => $data_login->pendaftaran_id])->row();

            if ($data_pengguna->keterangan == "Belum Diverifikasi" || $data_pengguna->keterangan == "Akun Dibatalkan") {
                $return = ['status' => false, 'pesan' => 'Akun anda belum diverifikasi oleh Operator Kemahasiswaan'];
            } else {
                $return = ['status' => true, 'data_login' => $data_login, 'nama_lengkap' => $data_pengguna->nama_lengkap];
            }
        } else {
            $return = ['status' => false, 'pesan' => 'Username dan Password tidak ditemukan sistem!'];
        }
        return $return;
    }
}
