<?php
class LoginModel extends CI_Model{
    function getLogin(){
        return $this->db->get('login');
    }
    function totalDataLogin(){
        return $this->db->count_all('login');
    }
    function insertLogin($login){
        return $this->db->insert("login",$login);
    }
    function login(){
        $username = $this->input->post("username");
        $pass = $this->input->post("password");
        $this->db->where("username",$username);
        $this->db->where("password",$pass);
        return $this->db->get("login");
    }
    function getLoginById($id){
        $this->db->where("id_login",$id);
        return $this->db->get('login');
    }
    function updateLoginUser($id){
        $login = array(
            "username" => $this->input->post("username"),
            "password" => $this->input->post("password"),
            "level" => "user"
            );
            $config['upload_path'] = './Asset/img';
            $config['allowed_types'] = 'gif|jpg|png';
            
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('gambar')) {
                $error = $this->upload->display_errors();
                echo $error;
                exit;
            } else {
                $upload_data = $this->upload->data();
                $login['foto'] = base_url("Asset/img/") . $upload_data['file_name'];    
            }
            
            $this->db->where("id_login",$id);
            return $this->db->update("login",$login);
        }
    function updateLoginAdmin($id){
        $login = array(
            "username" => $this->input->post("username"),
            "password" => $this->input->post("password"),
            "level" => "admin"
            );
            $config['upload_path'] = './Asset/img';
            $config['allowed_types'] = 'gif|jpg|png';
            
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('gambar')) {
                $error = $this->upload->display_errors();
                echo $error;
                exit;
            } else {
                $upload_data = $this->upload->data();
                $login['foto'] = base_url("Asset/img/") . $upload_data['file_name'];    
            }
            
            $this->db->where("id_login",$id);
            return $this->db->update("login",$login);
        }
    function deletelogin($id){
        $this->db->where("id_login",$id);
        return $this->db->delete("login");
    }
}
?>