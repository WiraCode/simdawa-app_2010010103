<?php

class PersyaratanModel extends CI_Model
{

    private $table = "persyaratan";

    public function get_persyaratan()
    {
        return $this->db->get($this->table)->result();
    }

    public function insert_persyaratan()
    {
        $data = [
            'nama_persyaratan' => $this->input->post('nama_persyaratan'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->insert($this->table, $data);
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', 'Data Persyaratan Beasiswa Berhasil ditambahkan!');
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', 'Data Persyaratan Beasiswa Gagal ditambahkan!');
            $this->session->set_flashdata('status', false);
        }
    }

    public function get_persyaratan_byid($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function update_persyaratan()
    {
        $data = [
            'nama_persyaratan' => $this->input->post('nama_persyaratan'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', 'Data Persyaratan Beasiswa Berhasil diubah!');
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', 'Data Persyaratan Beasiswa Gagal diubah!');
            $this->session->set_flashdata('status', false);
        }
    }

    public function delete_persyaratan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', 'Data Persyaratan Beasiswa Berhasil dihapus!');
            $this->session->set_flashdata('status', true);
        } else {
            $this->session->set_flashdata('pesan', 'Data Persyaratan Beasiswa Gagal dihapus!');
            $this->session->set_flashdata('status', false);
        }
    }
}
