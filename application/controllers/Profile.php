<?php
class Profile extends CI_Controller
{
    public function index()
    {
    }
    public function update()
    {
        $foto = $_FILES['foto'];
        if ($foto['name'] != '') {
            $config['upload_path'] = './assets/img/profiles';
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
            "name"        => $this->input->post("nama"),
            "email"        => $this->input->post("email"),
            "id" => $this->input->post("id")
        ];
        if (!is_array($foto)) {
            $data["image"] = $foto;
        }
        $this->db->where_in("id", $data['id'])->update("users", $data);
        redirect("");
    }
}
