<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pendaftaran
 *
 * @author suhindra
 */
class pendaftaran extends CI_Controller {
    //put your code here
     function __construct(){
        parent::__construct();
	$post_array = $this->session->userdata('session_data');
	if ($post_array['is_login'] != true ){
	redirect('user/akses');
	}
        $this->load->model('MPendaftaran');
        $this->load->model('mobatkeluar');
    }
    
    
    function index(){
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/pendaftaran_home');
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_pendaftaran');        
        ;
    }
    
    function addPendaftaran(){
        $data=array(
            'id_pendaftaran'=> $this->MPendaftaran->getKodePendaftaran(),
            'no_urut'=>$this->MPendaftaran->getNoUrutPendaftaran(),
            'id_pasien'=>$this->input->post('id_pasien'),
	    'tgl_pendaftaran'=>  $this->input->post('tgl_pendaftaran'),
	);
	
        $this->MPendaftaran->insertPendaftaran($data);
        redirect("pendaftaran/index");
    	
	}
   
    
        
    function formAddPendaftaran(){
        $data=array(
        'id_pendaftaran'=>$this->MPendaftaran->getKodePendaftaran(),
        'no_urut'=>  $this->MPendaftaran->getNoUrutPendaftaran(),
        'data_pasien'=>$this->mobatkeluar->manualQuery("SELECT * from pasien ")->result(),
            );
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/pendaftaran_add',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_pasien');
        }

   function getList()
    {
        $this->datatables->select('a.id_pendaftaran,a.id_pasien, b.nama_pasien,a.no_urut,a.tgl_pendaftaran')
                         ->from('pendaftaran a, pasien b');
	
        echo $this->datatables->generate();

    }
}

?>
