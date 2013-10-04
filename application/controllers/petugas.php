<?php
class Petugas extends CI_Controller{
    function __construct(){
        parent::__construct();

	$post_array = $this->session->userdata('session_data');
	if ($post_array['type'] != 'Admin' ){
	redirect('dashboard/akses');
	}
        $this->load->model('MPetugas');
    }

    function index(){
      
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/petugas_home');
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
        $this->load->view('script/js_petugas');
        ;
    }

//
//    ===================== INSERT =====================
    function addPetugas(){
        $data=array(
            'id_petugas'=> $this->MPetugas->getKodePetugas(),
            'nama_petugas'=>$this->input->post('nama_petugas'),
	    'username'=>$this->input->post('username'),
	    'password'=>md5($this->input->post('password')),
	    'type'=>$this->input->post('type'),
	    'no_hp'=>$this->input->post('no_hp'),
	    'sms_gateway'=>$this->input->post('sms')
        );
	
        $this->MPetugas->insertPetugas($data);
        redirect("petugas/index");
    	
	}
   

//    ======================== EDIT =======================
    function formAddPetugas(){
	$data['id_petugas']=$this->MPetugas->getKodePetugas();
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/petugas_add',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_petugas');
        }

  function getList()
    {
        $this->datatables->select('id_petugas,nama_petugas,username,type,no_hp,sms_gateway')
                         ->from('petugas');
	$this->datatables->add_column('aksi', '<a href="formEditPetugas/$1" onclick="return confirm($str)" class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title=" Edit "><i class="gicon-edit"></i></a> <a href="deletePetugas/$1" class="btn  btn-small" rel="tooltip" data-placement="bottom" data-original-title="Remove"><i class="gicon-remove "></i></a>', 'id_petugas');
        echo $this->datatables->generate();

    }

  function formEditPetugas($id_petugas){
	$data['data_petugas']=$this->MPetugas->getPetugasById($id_petugas);
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/petugas_edit',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_petugas');
        }

    function editPetugas(){
        $id = $this->input->post('id_petugas');
        $edit=array(
            'id_petugas'=> $this->input->post('id_petugas'),
            'nama_petugas'=> $this->input->post('nama_petugas'),
            'username'=> $this->input->post('username'),
	    'password'=> md5($this->input->post('password')),
	    'type'=>$this->input->post('type'),
	    'no_hp'=>$this->input->post('no_hp'),
	    'sms_gateway'=>$this->input->post('sms')
            );
        $this->MPetugas->updatePetugas($id,$edit);
        redirect("petugas/index");
    }
 

//    ========================== DELETE =======================
    function deletePetugas(){
        $id = $this->uri->segment(3);
        $this->MPetugas->deletePetugas($id);
        redirect("petugas/index");
   
}

}
