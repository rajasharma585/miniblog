<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		if(isset($_SESSION['user_id'])){
			redirect('admin/dashboard');
		}
		//$data = [];
		if(isset($_SESSION['error'])){
			//die($_SESSION['error']);
			$data['error'] = $_SESSION['error'];
		}else{
			$data['error'] = "NO_ERROR";
		}
		$this->load->view('admin/loginview',$data);
	}
	public function login_post() {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $this->db->query("SELECT * FROM `backenduser` WHERE `username`='$email' AND `password`='$password'");
        if ($query->num_rows() > 0) {
            // Credentials are valid
            $result = $query->result_array();
            //echo "<pre>";
            //print_r($result);
            $this->session->set_userdata('user_id', $result[0]['uid']);
            redirect('admin/dashboard');
        } else {
            // Invalid credentials
            $this->session->set_flashdata('error', 'invalid login details');
            redirect('admin/login');

        }
    	} else {
        	die("Invalid Input");
    	}
	}
	public function logout(){
		session_destroy();
		redirect('admin/login');
	}

}
