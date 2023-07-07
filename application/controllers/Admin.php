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
      $this->load->model("Barang_model");
      $data["barang"] = $this->Barang_model->ambilBarang();
      $data["title"] = "Dashboard";
      $data["user"] = $this->__getAdmin();
      $data["dashboard"] = true;
      $this->load->view("templates/header", $data);
      $this->load->view("templates/sidebar", $data);
      $this->load->view("admin/index");
      $this->load->view("templates/footer");
   }
   public function profile()
   {
      $data["title"] = "Profile";
      $data["user"] = $this->__getAdmin();
      $data["profile"] = true;
      $this->load->view("templates/header", $data);
      $this->load->view("templates/sidebar", $data);
      $this->load->view("profile", $data);
      $this->load->view("templates/footer");
   }
   public function users()
   {
      $this->load->model("User_model");
      $data["title"] = "Users Management";
      $data["user"] = $this->__getAdmin();
      $data["users"] = true;
      $data["user_list"] = $this->User_model->getAllUser();
      $this->load->view("templates/header", $data);
      $this->load->view("templates/sidebar", $data);
      $this->load->view("admin/users", $data);
      $this->load->view("templates/footer");
   }
   public function active($id)
   {
      $this->db->where_in("id", $id)->update("users", ["is_active" => 1]);
      redirect(base_url() . "admin/users");
   }
   public function nonactive($id)
   {
      $this->db->where_in("id", $id)->update("users", ["is_active" => 0]);
      redirect(base_url() . "admin/users");
   }
   private function __getAdmin()
   {
      return  $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
   }
}
