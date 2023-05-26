<?php
class User extends CI_Controller
{
    public function index()
    {
        $data["title"] = "Dashboard";
        $data["user"] = $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
        $this->load->view("templates/header");
        $this->load->view("templates/sidebar");
        $this->load->view("user/index", $data);
        $this->load->view("templates/footer");
    }
    public function profile()
    {
        $data["title"] = "Profile";
        $this->load->view("templates/header");
        $this->load->view("templates/sidebar");
        $this->load->view("user/index", $data);
        $this->load->view("templates/footer");
    }
}
