<?php
class Admin extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      if (!($this->__getAdmin())) {
         redirect("auth");
      }
   }
   public function index()
   {
      $data["title"] = "Dashboard";
      $data["user"] = $this->__getAdmin();
      $data["dashboard"] = true;
      $this->load->view("templates/header", $data);
      $this->load->view("templates/sidebar", $data);
      $this->load->view("admin/index");
      $this->load->view("templates/footer");
   }
   private function __getAdmin()
   {
      return  $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
   }
}
