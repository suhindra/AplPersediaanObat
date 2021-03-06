<?php
class Akun extends CI_Controller{
	function __construct(){
	parent:: __construct();
	$post_array = $this->session->userdata('session_data');
	if ($post_array['is_login'] != true ){
	redirect('user/akses');
	}
	$this->load->model('makun');
	}

	function index(){
	$data['data_akun']=$this->makun->getAllAkun();
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/akun_home',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_obat');	
	}

	function formEditAkun($id){
	$data['data_akun']= $this->makun->getAkunById($id);
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/akun_edit',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_obat');

	}

	function editAkun(){
	$id = $this->input->post('kode_akun');
        $edit=array(
            'kode_akun'=> $this->input->post('kode_akun'),
            'akun'=> $this->input->post('akun'),
            );
        $this->makun->updateAkun($id,$edit);
	$this->session->set_flashdata('message','Berhasil mengubah data obat');
        redirect("akun/index");

	}
}
