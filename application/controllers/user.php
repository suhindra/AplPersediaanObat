<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author suhindra
 */
class user extends CI_Controller {
 
    function  __construct() {
        parent::__construct();
        $this->load->model('mlogin');
    }
 
    function login() {
	$this->load->helper(array('form', 'url'));
	
 
        $this->form_validation->set_rules('username', 'username', 'required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|xss_clean');
 
        $this->form_validation->set_error_delimiters('', '<br/>');
 
        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
 	    $this->load->library('form_validation');
            $login_data = $this->mlogin->cek_user_login($username, $password);
            if($login_data){
            $session_data = array(
		'nama_petugas' => $login_data['nama_petugas'], 
                'id_petugas' => $login_data['id_petugas'],
                'username' => $login_data['username'],
		'password' => md5($password),
                'type' => $login_data['type'],
                'is_login' => TRUE
            );
 	    $this->session->set_userdata('session_data',$session_data);
           
 
            redirect('dashboard/index');
 
            }else{
                $this->session->set_flashdata('message','Login Gagal, Kombinasi username dan password salah.');
                redirect('user/login');
            }
        }
        $this->load->view('pages/petugas_login');
    }
 
    function dashboard() {
        $this->check_logged_in();
        $this->load->view('dashboard/index');
    }
   
    function logout() {
 
        $data = array
            (
            'user_id' => 0,
            'username' => 0,
            'type' => 0,
            'is_login' => FALSE
        );
 
        $this->session->sess_destroy();
        $this->session->unset_userdata($data);
        redirect('user/login');
    }
 
    public function check_logged_in() {
        if ($this->session->userdata('is_login') != TRUE) {
            redirect('petugas_login', 'refresh');
            exit();
        }
    }
 
    public function is_logged_in() {
        if ($this->session->userdata('logged_in') == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	function akses(){
	$this->load->view('pages/forbiden');

}

}

