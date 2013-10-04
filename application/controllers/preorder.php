<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of preorder
 *
 * @author suhindra
 */
class preorder extends CI_Controller {
    //put your code here
     function __construct(){
        parent::__construct();

	$post_array = $this->session->userdata('session_data');
	if ($post_array['type'] != 'Admin' ){
	redirect('dashboard/akses');
	}
        $this->load->model('mobatkeluar');
        $this->load->model('mobat');
        $this->load->model('mpreorder');
     }
     function index() {
         $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/preorder_home');
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_preorder');
     }
     
     function getList()
    {
       $this->datatables->select("a.id_preorder,  b.nama_petugas, c.nama_supplier, a.tgl_preorder")
	                 ->from('preorder a, petugas b, supplier c')
			 ->where('a.id_petugas = b.id_petugas AND a.id_supplier = c.id_supplier');
	$this->datatables->add_column('aksi', '<a href="detailPreorder/$1" class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title="Edit"><i class="gicon-eye-open"></i></a>
            <a href="cetakPreorder/$1" target="_blank" class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title="Edit"><i class="gicon-edit"></i></a>', 'a.id_preorder');
	
	           echo $this->datatables->generate();

    }
    function detailPreorder(){
	$id=$this->uri->segment(3);
	$data['data_preorder']=$this->mpreorder->getDetailPreorder($id);
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
	$this->load->view('pages/preorder_detil',$data);        
	$this->load->view('element/footer');
        $this->load->view('element/javascript');
	$this->load->view('script/js_obatkeluaradd');
}
    function cetakPreorder(){
	$id=$this->uri->segment(3);
	$data['data_preorder']=$this->mpreorder->getDetailPreorder($id);
	$this->load->view('laporan/printpreorder',$data);
}
     function formAddPreorder() {
         $data=array(
            'id_preorder'=>$this->mpreorder->getKodePreorder(),
            'data_obat'=>$this->mobatkeluar->manualQuery("SELECT * from obat")->result(),
	    'data_supplier'=>$this->mobatkeluar->manualQuery("SELECT * from supplier ")->result(),
        );
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
	$this->load->view('pages/preorder',$data);        
	$this->load->view('element/footer');
        $this->load->view('element/javascript');
	$this->load->view('script/js_obatkeluaradd');
     }

      function tambahObatToCart(){
	$kode=$this->input->post('id_obat');
        $data = array(
            'id'    => $this->input->post('id_obat'),
            'qty'   => $this->input->post('jumlah'),
            'price' => $this->input->post('jumlah'),
            'name'  => $this->mobat->getNamaObatById($kode)
        );
        $this->cart->insert($data);
        redirect('preorder/formAddPreorder');
	    
     }
     function addObatPreorder(){
	
        $d_master['id_preorder'] = $this->mpreorder->getKodePreorder();
        $temp = $d_master['id_preorder'];
	$d_master['id_petugas'] = $this->input->post('id_petugas');
	$d_master['id_supplier'] = $this->input->post('id_supplier');
 
        $d_master['tgl_preorder'] = date("Y-m-d",strtotime($this->input->post('tgl_transaksi')));
        $this->mobatkeluar->insertData("preorder",$d_master);

 

        foreach($this->cart->contents() as $items){
            $d_detail['id_preorder'] = $temp;
            $d_detail['id_obat'] = $items['id'];
            $d_detail['jumlah'] = $items['qty'];
	    $this->mobatkeluar->insertData("preorder_detil",$d_detail);

           
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('preorder/index');
    }
    function hapusObatCart(){
	    $rowid = $this->uri->segment(3);
    $data = array(
        'rowid' => $rowid,
        'qty' => 0

 
        );
        $this->cart->update($data);

        redirect('preorder/formAddPreorder');
	
    }
}
?>
