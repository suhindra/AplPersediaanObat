<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Obat
 *
 * @author suhindra
 */
class Obat extends CI_Controller{

    
    function __construct(){
        parent::__construct();
	$post_array = $this->session->userdata('session_data');
	if ($post_array['is_login'] != true ){
	redirect('user/akses');
	}
        $this->load->model('MObat');
        $this->load->model('MObatKeluar');
       
    }

    function index(){
    
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/obat_home');
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_obat');
        ;
    }
	
	function obatKadaluarsa(){
        $data['data_obat']=$this->MObat->getAllTransaksi();
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/obat_kadaluarsa',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_obatkadaluarsa');
        ;
	
}
	function getListKadaluarsa(){
	 $this->datatables->select('a.id_transaksi, a.kode_obat, b.nama_obat, a.stok , a.tgl_kadaluarsa')
                         ->from('obat_masukdetil a, obat b')
			 ->where('a.kode_obat = b.kode_obat AND a.tgl_kadaluarsa <= CURDATE() AND a.stok > 0');
	 $this->datatables->add_column('aksi', '</div><a data-original-title="" href="#Modal$1" class="btn" data-toggle="modal"><i class="gicon-edit"></a></div>','a.id_transaksi');
	           echo $this->datatables->generate();
	}
    function kategori(){
     
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/kategoriobat_home');
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_kategoriobat');
        ;
    }

    function obatOrder(){
	$data['data_order']=$this->MObat->getObatOrder();
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/obat_order',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_obat');	
	}

   function detailObat($kode_obat){
	$data=array(
	'detail_obat'=>$this->MObat->getDetailObat($kode_obat),
	'nama_obat'=>$this->MObat->getNamaObatById($kode_obat),
	);

	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/obat_detil',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_obat');

	}
//
//    ===================== INSERT =====================
    function addObat(){
        $data=array(
            'kode_obat'=> $this->MObat->getKodeObat(),
            'nama_obat'=>$this->input->post('nama_obat'),
            'kode_satuan'=>$this->input->post('kode_kategori'),
        );
	
        $this->MObat->insertObat($data);
        redirect("obat/index");
    	
	}

   function addKategori(){
        $data=array(
	    'kode_satuan'=> $this->MObat->getKodeSatuan(),
            'satuan'=>$this->input->post('satuan'),
	    
        );
	
        $this->MObat->insertKategori($data);
        redirect("obat/kategori");
    	
	}

    function getList()
    {
        $this->datatables->select('a.kode_obat, a.nama_obat, a.stok,b.satuan , a.safety_stok, a.rop')
                         ->from('obat a, satuan b')
			 ->where('a.kode_satuan = b.kode_satuan');
	$this->datatables->add_column('aksi', '<div class="btn-group"> <a href="formEditObat/$1"  class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title="Edit"><i class="gicon-edit"></i></a>
<a href="detailObat/$1"  class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title=" Edit "><i class="gicon-eye-open"></i></a>
 <a href="deleteObat/$1" class="btn  btn-small" rel="tooltip" data-placement="bottom" data-original-title="Remove"><i class="gicon-remove "></i></a> </div>', 'a.kode_obat');
	
	           echo $this->datatables->generate();

    }
	
    function getListKategori()
    {
        $this->datatables->select('kode_satuan,satuan')
                         ->from('satuan');
	$this->datatables->add_column('aksi', '<a href="formEditKategori/$1" onclick="return confirm($str)" class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title="Edit"><i class="gicon-edit"></i></a> <a href="deleteKategori/$1" class="btn  btn-small" rel="tooltip" data-placement="bottom" data-original-title="Remove"><i class="gicon-remove "></i></a>', 'kode_satuan');
	
	           echo $this->datatables->generate();

    }


    function formAddObat(){
	$data=array(
	'data_kategori'=>$this->MObat->manualQuery("SELECT * from satuan ")->result(),
	'kode_obat'=>$this->MObat->getKodeObat(),
	);
	
	$this->load->view('element/loading');
	$this->load->view('element/left');	
        $this->load->view('element/header');
        $this->load->view('pages/obat_add',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_obat');
        }

    function formAddKategori(){
	$data['kode_satuan']=$this->MObat->getKodeSatuan();
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/kategoriobat_add',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_obat');
        }

   function formEditObat($kode_obat){
	$data=array(
	'data_kategori'=>$this->MObat->manualQuery("SELECT * from satuan ")->result(),
	'data_obat'=>$this->MObat->getObatById($kode_obat),
	);
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/obat_edit',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_obat');
        }

    function formEditKategori($kode_satuan){
	$data['data_kategori']=$this->MObat->getKategoriById($kode_satuan);
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/kategoriobat_edit',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
	$this->load->view('script/js_obat');
        }

    function editObat(){
        $id = $this->input->post('kode_obat');
        $edit=array(
            'kode_obat'=> $this->input->post('kode_obat'),
            'nama_obat'=> $this->input->post('nama_obat'),
            'kode_satuan'=> $this->input->post('kode_kategori'),
            );
        $this->MObat->updateObat($id,$edit);
	$this->session->set_flashdata('message','Berhasil mengubah data obat');
        redirect("obat/index");
    }
 


    function deleteObat(){
        $id = $this->uri->segment(3);
        $this->MObat->deleteObat($id);
        redirect("obat/index");
  
} 

    function deleteKategori(){
        $id = $this->uri->segment(3);
        $this->MObat->deleteKategori($id);
        redirect("obat/kategori");
  
}
 function editKategori(){
        $id = $this->input->post('kode_satuan');
        $edit=array(
    
	    'kode_satuan'=> $this->input->post('kode_satuan'),
            'satuan'=>$this->input->post('satuan'),
	  
            );
        $this->MObat->updateSatuan($id,$edit);
	$this->session->set_flashdata('message','Berhasil mengubah data Kategori');
        redirect("obat/kategori");
    }
 
    
}
