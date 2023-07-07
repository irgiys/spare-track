<?php
class Barang_model extends CI_Model
{
    public function index()
    {
    }
    public function ambilBarang()
    {
        return $this->db->get("barang")->result_array();
    }
    public function ambilBarangId($id)
    {
        return $this->db->where_in("id", $id)->get("barang")->row_array();
    }
    public function tambah($data)
    {
        $this->db->insert("barang", $data);
    }
    public function ubah($data)
    {
    }
    public function hapus($id)
    {
        return $this->db->where_in("id", $id)->delete("barang");
    }
}
