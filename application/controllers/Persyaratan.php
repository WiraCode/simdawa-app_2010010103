<?php
class Persyaratan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('PersyaratanModel');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['title'] = "Dashboard | SIMDAWA-APP";
        $data['persyaratan'] = $this->PersyaratanModel->get_persyaratan();
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/sidebar');
        $this->load->view('persyaratan/persyaratan_read', $data);
        $this->load->view('tamplate/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->PersyaratanModel->insert_persyaratan();
            redirect('Persyaratan');
        } else {
            $data['title'] = "Tambah Dashboard | SIMDAWA-APP";
            $data['persyaratan'] = $this->PersyaratanModel->get_persyaratan();
            $this->load->view('tamplate/header', $data);
            $this->load->view('tamplate/sidebar');
            $this->load->view('persyaratan/persyaratan_created');
            $this->load->view('tamplate/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->PersyaratanModel->update_persyaratan();
            redirect('persyaratan');
        } else {
            $data['title'] = "Perbaharui Dashboard | SIMDAWA-APP";
            $data['persyaratan'] = $this->PersyaratanModel->get_persyaratan_byid($id);
            $this->load->view('tamplate/header', $data);
            $this->load->view('tamplate/sidebar');
            $this->load->view('persyaratan/persyaratan_update', $data);
            $this->load->view('tamplate/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->PersyaratanModel->delete_persyaratan($id);
            redirect('persyaratan');
        }
    }

    public function cetak()
    {
        $data['persyaratan'] = $this->PersyaratanModel->get_persyaratan();
        $this->load->view('persyaratan/persyaratan_print', $data);
    }
}
