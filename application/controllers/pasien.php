<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pasien
 *
 * @author suhindra
 */
class Pasien extends CI_Controller{
    function __construct(){
        parent::__construct();
	$post_array = $this->session->userdata('session_data');
	if ($post_array['is_login'] != true ){
	redirect('user/akses');
	}
        $this->load->model('MPasien');
    }

    function index(){
        $data['data_supplier']=$this->MPasien->getAllPasien();
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/pasien_home',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_pasien');        
        ;
    }

   function addPasien(){
        $data=array(
            'id_pasien'=> $this->MPasien->getKodePasien(),
            'nama_pasien'=>$this->input->post('nama_pasien'),
            'alamat_pasien'=>$this->input->post('alamat_pasien'),
	    
	);
	
        $this->MPasien->insertPasien($data);
        redirect("pasien/index");
    	
	}
   

    function formAddPasien(){
	$data['id_pasien']=$this->MPasien->getKodePasien();
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/pasien_add',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_pasien');
        }

   function getList()
    {
        $this->datatables->select('id_pasien, nama_pasien,alamat_pasien')
                         ->from('pasien');
	$this->datatables->add_column('aksi', '<a href="formEditPasien/$1" onclick="return confirm($str)" class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title=" Edit "><i class="gicon-edit"></i></a> <a href="deletePasien/$1" class="btn  btn-small" rel="tooltip" data-placement="bottom" data-original-title="Remove"><i class="gicon-remove "></i></a>', 'id_pasien');
        echo $this->datatables->generate();

    }

	function formEditPasien($id_pasien){
	$data['data_pasien']=$this->MPasien->getPasienById($id_pasien);
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/pasien_edit',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_pasien');
        }

    function editPasien(){
        $id = $this->input->post('id_pasien');
        $edit=array(
            'id_pasien'=> $this->input->post('id_pasien'),
            'nama_pasien'=> $this->input->post('nama_pasien'),
            'alamat_pasien'=> $this->input->post('alamat_pasien'),
            );
        $this->MPasien->updatePasien($id,$edit);
        redirect("pasien/index");
    }
 
    function deletePasien(){
        $id = $this->uri->segment(3);
        $this->MPasien->deletePasien($id);
        redirect("pasien/index");
   
}

}
