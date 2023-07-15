<?php 
class Auth extends CI_Controller {
    public function index (){
        $this->load->view('Navbar');
        $this->load->view('Dashboard');
        $this->load->view('Content');
    }
    function login(){
        $this->load->model("LoginModel");
        $result = $this->LoginModel->login();
        
        if($result->num_rows() > 0){
            $row = $result->row();
            $session_data = array(
                "login" => true,
                "username" => $this->input->post("username"),
                "level" => $row->level,
                "foto" => $row->foto
            );
            $this->session->set_userdata($session_data);
            redirect(site_url("home"));
        } else {
            $this->session->set_flashdata("error", "Username atau Password Salah!");
            redirect(site_url("home"));
        }
    }
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

?>