<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user = $this->__getUser();
        if (!$user || $user["role_id"] != 1) {
            redirect("auth");
        }
    }
    public function index()
    {
        $data["title"] = "Dashboard";
        $data["user"] = $this->__getUser();
        $data["dashboard"] = true;
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("user/index", $data);
        $this->load->view("templates/footer");
    }

    public function history()
    {
        $data["title"] = "History";
        $data["user"] = $this->__getUser();
        $data["history"] = true;
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("user/index", $data);
        $this->load->view("templates/footer");
    }
    public function notifications()
    {
        $data["title"] = "Notifications";
        $data["user"] = $this->__getUser();
        $data["notifications"] = true;
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("user/index", $data);
        $this->load->view("templates/footer");
    }
    public function profile()
    {
        $data["title"] = "Profile";
        $data["user"] = $this->__getUser();
        $data["profile"] = true;
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("profile", $data);
        $this->load->view("templates/footer");
    }
    private function __getUser()
    {
        return  $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
    }
}
