<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supplier
 *
 * @author suhindra
 */
class Supplier extends CI_Controller{
    function __construct(){
        parent::__construct();
	$post_array = $this->session->userdata('session_data');
	if ($post_array['is_login'] != true ){
	redirect('user/akses');
	}
        $this->load->model('MSupplier');
    }

    function index(){
        $data=array(
            'title'=>'Master Data',
            'id_supplier'=>$this->MSupplier->getKodeSupplier(),
            'data_supplier'=>$this->MSupplier->getAllSupplier(),
            );
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/supplier_home',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_supplier');        
        ;
    }

    function addSupplier(){
        $data=array(
            'id_supplier'=> $this->MSupplier->getKodeSupplier(),
            'nama_supplier'=>$this->input->post('nama_supplier'),
            'alamat_supplier'=>$this->input->post('alamat_supplier'),
	    'no_telp'=>$this->input->post('no_telp'),        
	);
	
        $this->MSupplier->insertSupplier($data);
        redirect("supplier/index");
    	
	}
   

//    ======================== EDIT =======================
    function formAddSupplier(){
	$data['id_supplier']=$this->MSupplier->getKodeSupplier();
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/supplier_add',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_supplier');
        }
   function getList()
    {
        $this->datatables->select('id_supplier, nama_supplier,alamat_supplier, no_telp')
                         ->from('supplier');
	$this->datatables->add_column('aksi', '<a href="formEditSupplier/$1" onclick="return confirm($str)" class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title=" Edit "><i class="gicon-edit"></i></a> <a href="deleteSupplier/$1" class="btn  btn-small" rel="tooltip" data-placement="bottom" data-original-title="Remove"><i class="gicon-remove "></i></a>', 'id_supplier');
        echo $this->datatables->generate();

    }

	function formEditSupplier($id_supplier){
	$data['data_supplier']=$this->MSupplier->getSupplierById($id_supplier);
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/supplier_edit',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_supplier');
        }

    function editSupplier(){
        $id = $this->input->post('id_supplier');
        $edit=array(
            'id_supplier'=> $this->input->post('id_supplier'),
            'nama_supplier'=> $this->input->post('nama_supplier'),
            'alamat_supplier'=> $this->input->post('alamat_supplier'),
	    'no_telp' => $this->input->post('no_telp'),
            );
        $this->MSupplier->updateSupplier($id,$edit);
        redirect("supplier/index");
    }
 

//    ========================== DELETE =======================
    function deleteSupplier(){
        $id = $this->uri->segment(3);
        $this->MSupplier->deleteSupplier($id);
        redirect("supplier/index");
   
}

}
