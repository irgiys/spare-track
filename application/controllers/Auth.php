<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
    }
    public function index()
    {
        $this->form_validation->set_rules('email', "Email", 'trim|required|valid_email');
        $this->form_validation->set_rules('password', "Password", 'trim|required');

        if ($this->form_validation->run() == false) {
            $data["title"] = "Sign In";
            $this->load->view("templates/auth_header", $data);
            $this->load->view("auth/signin");
            $this->load->view("templates/auth_footer");
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $user = $this->db->get_where("users", ["email" => $email])->row_array();
        if ($user) {
            if ($user["is_active"] == 1) {
                if (password_verify($password, $user["password"])) {
                    $data = [
                        "email" => $user["email"],
                        "role_id" => $user["role_id"]
                    ];
                    $this->session->set_userdata($data);
                    if ($data["role_id"] == 1) {
                        redirect("admin");
                    } else {
                        redirect("user");
                    }
                } else {
                    $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm">Wrong password!</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>');
                    redirect("auth");
                }
            } else {
                $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible text-white" role="alert">
                <span class="text-sm">This email has not been activated yet!</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');
                redirect("auth");
            }
        } else {
            $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible text-white" role="alert">
            <span class="text-sm">Email is not registered!</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            redirect("auth");
        }
    }
    public function signup()
    {
        $this->form_validation->set_rules("name", "Name", "required|trim");
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email|is_unique[users.email]", [
            "is_unique" => "This email has already registered!"
        ]);
        $this->form_validation->set_rules("password1", "Password", "required|trim|min_length[3]|matches[password2]", [
            "matches" => "Password don't match!",
            "min_length" => "Password too short!"
        ]);
        $this->form_validation->set_rules("password2", "Password", "required|trim|matches[password1]");

        if ($this->form_validation->run() == false) {
            $data["title"] = "Sign Up";
            $this->load->view("templates/auth_header", $data);
            $this->load->view("auth/signup");
            $this->load->view("templates/auth_footer");
        } else {
            $data = [
                "name"         => $this->input->post("name"),
                "email"        => $this->input->post("email"),
                "image"        => "default.jpg",
                "password"     => password_hash($this->input->post("password1"), PASSWORD_DEFAULT),
                "role_id"      => 2,
                "is_active"    => 1,
                "date_created" => time()
            ];
            $this->db->insert("users", $data);

            $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible text-white" role="alert">
            <span class="text-sm">Congratulation your account has been created. Let\'s Sign In!</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>');
            redirect("auth");
        }
    }
    public function logout()
    {
        $this->session->unset_userdata("email");
        $this->session->unset_userdata("role_id");
        $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible text-white" role="alert">
        <span class="text-sm">You had been logged out!</span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>');
        redirect("auth");
    }
}
