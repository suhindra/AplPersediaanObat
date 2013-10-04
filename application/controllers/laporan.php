<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Laporan
 *
 * @author suhindra
 */
class Laporan extends CI_Controller{
    function __construct(){
        parent::__construct();
	$post_array = $this->session->userdata('session_data');
	if ($post_array['type'] != 'Admin' ){
	redirect('dashboard/akses');
	}
	$this->load->model('mobat');
	$this->load->model('mlaporan');
    } 
    
    function cetakJurnalUmum(){
     	$bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');	
	$data =array (
	'jurnal' => $this->mlaporan->getJurnal($bulan,$tahun),
	'data_bulan'=>$this->input->post('bulan'),
	'data_tahun'=>$this->input->post('tahun')
	);
    	
        $this->load->view('laporan/print_jurnal',$data);
	
    }

    function viewJurnalUmum(){
	$bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');	
	$data =array (
	'jurnal' => $this->mlaporan->getJurnal($bulan,$tahun),
	'data_bulan'=>$this->input->post('bulan'),
	'data_tahun'=>$this->input->post('tahun')
	);
    	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('laporan/jurnalumum',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_obat');	
   }
    
  
    function viewLaporanPersediaan(){
	$data['data_persediaan'] = $this->mlaporan->getPersediaan();
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('laporan/laporan_persediaan',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_obat');
   }

    function viewLaporanObatMasuk(){
	$bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');
	$data =array (
	'data_obatmasuk' => $this->mlaporan->getLapObatMasuk($bulan,$tahun),
	'data_bulan' => $bulan,
	'data_tahun' => $tahun
	);
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('laporan/laporan_obatmasuk',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_obat');
        

   }

  function viewLaporanObatKeluar(){
	$bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');
	$data= array(
	'data_obatkeluar' => $this->mlaporan->getLapObatKeluar($bulan,$tahun),
	'data_bulan' => $bulan,
	'data_tahun' => $tahun
	);
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('laporan/laporan_obatkeluar',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_obat');
        

   }

    

    
    function cetakBukuBesar(){
        $bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');
	$data =array (
	
	'saldoTitipan' =>$this->mlaporan->getSaldoTitipan($bulan,$tahun),
	'jurnalTitipan' => $this->mlaporan->getBukuBesarTitipan($bulan,$tahun),
	'saldoPersediaan' =>$this->mlaporan->getSaldoPersediaan($bulan,$tahun),
	'jurnalPersediaan' => $this->mlaporan->getBukuBesarPersediaan($bulan,$tahun),
        'data_bulan' => $bulan,
	'data_tahun' => $tahun
	);
    	
        $this->load->view('laporan/print_bukubesar',$data);
	
    }

     function viewBukuBesar(){
	$bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');
	$data =array (
	'saldoTitipan' =>$this->mlaporan->getSaldoTitipan($bulan,$tahun),
	'jurnalTitipan' => $this->mlaporan->getBukuBesarTitipan($bulan,$tahun),
	'saldoPersediaan' =>$this->mlaporan->getSaldoPersediaan($bulan,$tahun),
	'jurnalPersediaan' => $this->mlaporan->getBukuBesarPersediaan($bulan,$tahun),
        'data_bulan' => $bulan,
	'data_tahun' => $tahun
	);
     	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');     
        $this->load->view('laporan/bukubesar',$data);
	$this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_obat');
        
	
    }

    function cetakLaporanObatMasuk(){
     	$bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');
	$data =array (
	'data_obatmasuk' => $this->mlaporan->getLapObatMasuk($bulan,$tahun),
	'data_bulan' => $bulan,
	'data_tahun' => $tahun
	);
        $this->load->view('laporan/print_laporan_obat_masuk',$data);
	
    }
	
    function cetakLaporanObatKeluar(){
     	$bulan = $this->input->post('bulan');
	$tahun = $this->input->post('tahun');
	$data= array(
	'data_obatkeluar' => $this->mlaporan->getLapObatKeluar($bulan,$tahun),
	'data_bulan' => $bulan,
	'data_tahun' => $tahun
	);
        $this->load->view('laporan/print_laporan_obat_keluar',$data);
	
    }
  
	
    function cetakLaporanPersediaan(){
     	$data['data_persediaan'] = $this->mlaporan->getPersediaan();
        $this->load->view('laporan/print_laporan_persediaan',$data);
    }

    function OutboxSms(){
	$this->datatables->select('Text, destination_number')
                         ->from('outbox');
	
	           echo $this->datatables->generate();

	}

    function ItemSent(){
        $this->datatables->select('Text, destination_number')
                         ->from('sentitems');
	
	           echo $this->datatables->generate();

	} 

    


}
