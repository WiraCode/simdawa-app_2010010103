<?php
class Prodi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ProdiModel');
    }

    public function index()
    {
        $data['title'] = "Dashboard | SIMDAWA-APP";
        $data['prodi'] = $this->ProdiModel->get_prodi();
        $this->load->view('tamplate/header', $data);
        $this->load->view('tamplate/sidebar');
        $this->load->view('prodi/prodi_read', $data);
        $this->load->view('tamplate/footer');
    }

    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->ProdiModel->insert_prodi();
            redirect('prodi');
        } else {
            $data['title'] = "Tambah Dashboard | SIMDAWA-APP";
            $data['prodi'] = $this->ProdiModel->get_prodi();
            $this->load->view('tamplate/header', $data);
            $this->load->view('tamplate/sidebar');
            $this->load->view('prodi/prodi_created');
            $this->load->view('tamplate/footer');
        }
    }

    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->ProdiModel->update_Prodi();
            redirect('prodi');
        } else {
            $data['title'] = "Perbaharui Dashboard | SIMDAWA-APP";
            $data['prodi'] = $this->ProdiModel->get_prodi_byid($id);
            $this->load->view('tamplate/header', $data);
            $this->load->view('tamplate/sidebar');
            $this->load->view('Prodi/Prodi_update', $data);
            $this->load->view('tamplate/footer');
        }
    }

    public function hapus($id)
    {
        if (isset($id)) {
            $this->ProdiModel->delete_prodi($id);
            redirect('prodi');
        }
    }
}
