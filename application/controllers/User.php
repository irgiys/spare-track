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
        $this->load->model("Barang_model");
        $data["in_cart"] = $this->db->select(["quantity", "checkout_id", "product_id",  "status", "harga", "nama", "merk", "kategori", "foto"])->where("status", 0)->from("checkout_product")->join("barang", "product_id = barang.id")->get()->result_array();
        $data["count_cart"] = $this->db->where(["status" => 0])->count_all_results('checkout_product ');
        $data["barang"] = $this->Barang_model->ambilBarang();
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
        $data["barang"] = $this->db->select(["quantity", "total", "tanggal", "checkout.checkout_id", "product_id", "user_id", "status", "harga", "nama", "merk", "kategori", "foto"])->where("status", 1)->from("checkout")->join("checkout_product", "checkout.checkout_id = checkout_product.checkout_id")->join("barang", "checkout_product.product_id = barang.id")->get()->result_array();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("history");
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
    public function cart($id)
    {
        $this->load->model("Barang_model");
        $barang = $this->Barang_model->ambilBarangId($id);
        if ($barang) {
            $quantity = $this->db->where(["product_id" => $id, "status" => 0])->get("checkout_product")->row_array();
            $checkId = $this->db->where_in("status", 0)->get("checkout_product")->row_array();
            $checkNew = $this->db->order_by("checkout_id", "desc")->limit(1)->get("checkout_product")->row_array();
            // jika masih status 0 artinya masih ada di sesi cart / belum dicheckout  
            if (is_array($checkId)) {
                $data["checkout_id"] = $checkId["checkout_id"];
                if (!is_array($quantity)) {
                    $data = [
                        "product_id" => $id,
                        "quantity" => 1
                    ];
                    $this->db->insert("checkout_product", $data);
                }
            } else {
                if (is_array($checkNew)) {
                    $data = [
                        "checkout_id" => $checkNew["checkout_id"] += 1,
                        "product_id" => $id,
                        "quantity" => 1
                    ];
                    $this->db->insert("checkout_product", $data);
                } else {
                    $data = [
                        "product_id" => $id,
                        "quantity" => 1
                    ];
                    $this->db->insert("checkout_product", $data);
                }
            }
            if (is_array($quantity)) {
                $data["quantity"] = $quantity["quantity"] += 1;
                $this->db->where(["product_id" => $id, "status" => 0])->update("checkout_product", $data);
            }
        }
        redirect(base_url("user"));
    }
    public function del_cart($id)
    {
        $this->db->where(["product_id" => $id, "status" => 0])->delete("checkout_product");
        redirect(base_url("user"));
    }
    public function checkout()
    {
        $data = [
            "checkout_id" => $this->input->post("check_id"),
            "user_id" => $this->input->post("user_id"),
            "total" => $this->input->post("total"),
            "tanggal" => time()
        ];
        $this->db->insert("checkout", $data);
        $this->db->where(["status" => 0])->update("checkout_product", ["status" => 1]);
        redirect(base_url("user"));
    }
    private function __getUser()
    {
        return  $this->db->get_where("users", ["email" => $this->session->userdata("email")])->row_array();
    }
}
