<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Obatmasuk
 *
 * @author suhindra
 */
class Obatmasuk extends CI_Controller{
    function __construct(){
        parent::__construct();
	$post_array = $this->session->userdata('session_data');
	if ($post_array['is_login'] != true ){
	redirect('user/akses');
	}
        $this->load->model('mobat');
        $this->load->model('mobatmasuk');
        $this->load->model('mlaporan');
                
    }

    function index(){

        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
	$this->load->view('pages/obatmasuk_home');        
	$this->load->view('element/footer');
        $this->load->view('element/javascript');
	$this->load->view('script/js_obatmasuk');
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }


	function getList()
    {
        $this->datatables->select("a.id_transaksi, a.tgl_transaksi, b.nama_petugas, c.nama_supplier, a.total_harga")
	                 ->from('obat_masuk a, petugas b, supplier c')
			 ->where('a.id_petugas = b.id_petugas AND a.id_supplier = c.id_supplier');
	$this->datatables->add_column('aksi', '<a href="detailObatMasuk/$1" class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title="Edit"><i class="gicon-eye-open"></i></a> ', 'a.id_transaksi');
	
	           echo $this->datatables->generate();

    }

    function formAddObatMasuk(){
      $data=array(
            'id_transaksi'=>$this->mobatmasuk->getKodeObatMasuk(),
            'data_obat'=>$this->mobatmasuk->manualQuery("SELECT * from obat ")->result(),
	    'data_supplier'=>$this->mobatmasuk->manualQuery("SELECT * from supplier ")->result(),
        );
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
	$this->load->view('pages/obatmasuk_add',$data);        
	$this->load->view('element/footer');
        $this->load->view('element/javascript');
	$this->load->view('script/js_obatmasukadd');
    }

   function detailObatMasuk(){
	$id=$this->uri->segment(3);
	$data['data_masukdetil']=$this->mobatmasuk->getDetailObatMasuk($id);
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
	$this->load->view('pages/obatmasuk_detil',$data);        
	$this->load->view('element/footer');
        $this->load->view('element/javascript');
	$this->load->view('script/js_obatkeluaradd');
}
    function tambahObatToCart(){
	$kode = $this->input->post('kode_obat');
	$id = $this->mobat->getNamaObatById($kode);
        $data = array(
            'id'    => $this->input->post('kode_obat'),
            'qty'   => $this->input->post('jumlah_masuk'),
            'price' => $this->input->post('harga'),
            'name'  => $this->mobat->getNamaObatById($kode),
	    'option'=> date("Y-m-d",strtotime($this->input->post('tgl_kadaluarsa')))
        );
        $this->cart->insert($data);
        redirect('obatmasuk/formAddObatMasuk');
    }

    function hapusObatCart(){
	    $rowid = $this->uri->segment(3);
    $data = array(
        'rowid' => $rowid,
        'qty' => 0

 
        );
        $this->cart->update($data);

        redirect('obatmasuk/formAddObatMasuk');
	
    }
    function addObatMasuk(){
	$id_jurnal=  $this->mlaporan->getIdJurnal();
        
        
        $d_master['id_transaksi'] = $this->mobatmasuk->getKodeObatMasuk();
        $temp = $d_master['id_transaksi'];
	$d_master['id_petugas'] = $this->input->post('id_petugas');
	$d_master['id_supplier'] = $this->input->post('id_supplier');
        $d_master['total_harga'] = $this->input->post('total');
        $d_master['tgl_transaksi'] = date("Y-m-d",strtotime($this->input->post('tgl_transaksi')));
        $this->mobatmasuk->insertData("obat_masuk",$d_master);

        $d_jurnal['id_jurnal']=  $id_jurnal;
	$d_jurnal['id_transaksimasuk'] = $temp;
	$d_jurnal['tgl_transaksi'] = date("Y-m-d",strtotime($this->input->post('tgl_transaksi')));
	$d_jurnal['kode_akun'] = ("112");
	$d_jurnal['debet'] = $d_master['total_harga'] = $this->input->post('total');
	$this->mobatmasuk->insertData("jurnal",$d_jurnal);
        
        $d_jurnal2['id_jurnal']=  $id_jurnal;
	$d_jurnal2['id_transaksimasuk'] = $temp;
	$d_jurnal2['tgl_transaksi'] = date("Y-m-d",strtotime($this->input->post('tgl_transaksi')));
	$d_jurnal2['kode_akun'] = ("113");
	$d_jurnal2['kredit'] = $d_master['total_harga'] = $this->input->post('total');
	$this->mobatmasuk->insertData("jurnal",$d_jurnal2);	

        foreach($this->cart->contents() as $items){
            $d_detail['id_transaksi'] = $temp;
            $d_detail['kode_obat'] = $items['id'];
            $d_detail['jumlah_obatmasuk'] = $items['qty'];
	    $d_detail['stok'] = $items['qty'];
            $d_detail['harga_obatmasuk'] = $items['price'];
	    $d_detail['tgl_kadaluarsa'] = $items['option'];
            $this->mobatmasuk->insertData("obat_masukdetil",$d_detail);

	    $obat['stok'] = $this->mobatmasuk->getTambahStok($d_detail['kode_obat'],$d_detail['jumlah_obatmasuk']);
            $key['kode_obat'] = $d_detail['kode_obat'];
            $this->mobatmasuk->updateData("obat",$obat,$key);
           
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('obatmasuk/index');
    }

   }
