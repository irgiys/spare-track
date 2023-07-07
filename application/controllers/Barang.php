<?php

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!($this->__getAdmin())) {
            redirect("auth");
        }
        $this->load->model("Barang_model");
    }
    public function index()
    {
    }
    public function tambah()
    {
        $foto = $_FILES['foto'];
        if ($foto['name'] != '') {
            $config['upload_path'] = './assets/img/products';
            $config['encrypt_name'] = true;
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Upload Gagal";
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = [
            "nama"        => $this->input->post("nama"),
            "stok"        => $this->input->post("stok"),
            "harga"       => $this->input->post("harga"),
            "kategori"       => $this->input->post("kategori"),
            "merk"       => $this->input->post("merk"),
            "added_at" => time(),
            "id_admin" => $this->input->post("id_admin")
        ];
        if (!is_array($foto)) {
            $data["foto"] = $foto;
        }
        $this->Barang_model->tambah($data);
        redirect("");
    }
    public function ubah($id)
    {
        $data["barang"] = $this->Barang_model->ambilBarangId($id);
        $data["title"] = "Update Barang";
        $data["user"] = $this->__getAdmin();
        $data["dashboard"] = true;
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("barang/update", $data);
        $this->load->view("templates/footer");
    }
    public function ubahReq()
    {
        $foto = $_FILES['foto'];
        if ($foto['name'] != '') {
            $config['upload_path'] = './assets/img/products';
            $config['encrypt_name'] = true;
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Upload Gagal";
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = [
            "nama"        => $this->input->post("nama"),
            "stok"        => $this->input->post("stok"),
            "harga"       => $this->input->post("harga"),
            "kategori"       => $this->input->post("kategori"),
            "merk"       => $this->input->post("merk"),
            "id" => $this->input->post("id")
        ];

        if (!is_array($foto)) {
            $data["foto"] = $foto;
        }
        $this->db->where_in("id", $data['id'])->update("barang", $data);
        redirect("");
    }
    public function detail($id)
    {
        $data["barang"] = $this->Barang_model->ambilBarangId($id);
        $data["title"] = "Update Barang";
        $data["user"] = $this->__getAdmin();
        $data["dashboard"] = true;
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("barang/detail", $data);
        $this->load->view("templates/footer");
    }
    public function hapus($id)
    {
        $this->Barang_model->hapus($id);
        redirect("");
    }
    private function __getAdmin()
    {
        return  $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
    }
}
