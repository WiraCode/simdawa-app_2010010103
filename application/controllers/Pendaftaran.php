<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('PendaftaranModel');
    }

    public function index()
    {
    }

    public function daftar()
    {
        if (isset($_POST['btn_daftar'])) {
            $cek_nopendaftaran = $this->PendaftaranModel->cek_nopendaftaran();
            if ($cek_nopendaftaran == true) {
                $this->Persyaratan->insert_jenis();
                redirect('jenis');
            } else {
                $upload = $this->PendaftaranModel->upload_bukti();
                if ($upload['result'] == 'success') {
                    $this->PendaftaranModel->insert_pendaftaran($upload);
                    redirect('pendaftaran/daftar');
                } else {
                    $this->session->set_flashdata('pesan', $upload['error']);
                    redirect('pendaftaran/daftar');
                }
            }
        } else {
            $data['title'] = "Pendaftaran Pengguna | SIMDAWA-APP";
            $this->load->view('pendaftaran/daftar_create', $data);
        }
    }
}
