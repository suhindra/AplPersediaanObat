<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of obatKeluar
 *
 * @author suhindra
 */
class Obatkeluar extends CI_Controller{
    function __construct(){
        parent::__construct();
	$post_array = $this->session->userdata('session_data');
	if ($post_array['is_login'] != true ){
	redirect('user/akses');
	}
        $this->load->model('mobat');
        $this->load->model('mobatkeluar');
        $this->load->model('mlaporan');
    }

    function index(){

        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
	$this->load->view('pages/obatkeluar_home');        
	$this->load->view('element/footer');
        $this->load->view('element/javascript');
	$this->load->view('script/js_obatkeluar');
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
    }


	function getList()
    {
        $this->datatables->select("a.id_transaksi, a.tgl_transaksi, b.nama_petugas, c.id_pendaftaran, a.total_harga")
	                 ->from('obat_keluar a, petugas b, pendaftaran c')
			 ->where('a.id_petugas = b.id_petugas AND a.id_pendaftaran = c.id_pendaftaran');	
	$this->datatables->add_column('aksi', '<a href="detailObatKeluar/$1" class="btn btn-small"  rel="tooltip" data-placement="left" data-original-title="Edit"><i class="gicon-eye-open"></i></a> ', 'a.id_transaksi');
	           echo $this->datatables->generate();

    }

    function formAddObatKeluar(){
      $data=array(
            'id_transaksi'=>$this->mobatkeluar->getKodeObatKeluar(),
            'data_obat'=>$this->mobatkeluar->manualQuery("SELECT * from obat")->result(),
	    'data_pendaftaran'=>$this->mobatkeluar->manualQuery("SELECT * from  pendaftaran where status = 0")->result(),
        );
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
	$this->load->view('pages/obatkeluar_add',$data);        
	$this->load->view('element/footer');
        $this->load->view('element/javascript');
	$this->load->view('script/js_obatkeluaradd');
    }

    function detailObatKeluar(){
	$id=$this->uri->segment(3);
	$data['data_keluardetil']=$this->mobatkeluar->getDetailObatKeluar($id);
	$this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
	$this->load->view('pages/obatkeluar_detil',$data);        
	$this->load->view('element/footer');
        $this->load->view('element/javascript');
	$this->load->view('script/js_obatkeluaradd');
    
    }

    
            
    function tambahObatToCart(){
	$kode = $this->input->post('kode_obat');
        $counter = $this->input->post('jumlah_keluar');
	$stok = $this->mobat->getStokObatById($kode);
	$qty = $this->input->post('jumlah_keluar');
	$kurang = $stok -$qty;
	if ($kurang<1){	
	echo "<script>javascript:alert('Stok tidak cukup'); window.location = 'formAddObatKeluar'</script>"; 
	}
	else {
        $data = array(
            'id'    => $this->input->post('kode_obat'),
            'qty'   => $this->input->post('jumlah_keluar'),
            'price' => $this->mobatkeluar->getHarga($kode,$counter)/$counter,
            'name'  => $this->mobat->getNamaObatById($kode)
        );
        $this->cart->insert($data);
        redirect('obatkeluar/formAddObatKeluar');
	}    
}

    function hapusObatCart(){
	    $rowid = $this->uri->segment(3);
    $data = array(
        'rowid' => $rowid,
        'qty' => 0

 
        );
        $this->cart->update($data);

        redirect('obatkeluar/formAddObatKeluar');
	}

    function addObatKeluar(){
	$id_jurnal=  $this->mlaporan->getIdJurnal();
        $d_master['id_transaksi'] = $this->mobatkeluar->getKodeObatKeluar();
        $temp = $d_master['id_transaksi'];	
        $d_master['total_harga'] = $this->input->post('total');
        $d_master['tgl_transaksi'] = date("Y-m-d",strtotime($this->input->post('tgl_transaksi')));
	$d_master['id_petugas'] = $this->input->post('id_petugas');
	$d_master['id_pendaftaran'] = $this->input->post('id_pendaftaran');
	$date = $d_master['tgl_transaksi'];
        $this->mobatkeluar->insertData("obat_keluar",$d_master);
        $this->mobatkeluar->manualQuery("update pendaftaran set status=1 where id_pendaftaran='".$d_master['id_pendaftaran']."'");
        
        $d_jurnal2['id_jurnal']=  $id_jurnal;
	$d_jurnal2['id_transaksikeluar'] = $temp;
	$d_jurnal2['tgl_transaksi'] = date("Y-m-d",strtotime($this->input->post('tgl_transaksi')));
	$d_jurnal2['kode_akun'] = ("113");
	$d_jurnal2['debet'] =  $this->input->post('total');
	$this->mobatkeluar->insertData("jurnal",$d_jurnal2);	

        $d_jurnal['id_jurnal']=  $id_jurnal;
	$d_jurnal['id_transaksikeluar'] = $temp;
	$d_jurnal['tgl_transaksi'] = date("Y-m-d",strtotime($this->input->post('tgl_transaksi')));
	$d_jurnal['kode_akun'] = ("112");
	$d_jurnal['kredit'] = $d_master['total_harga'] = $this->input->post('total');
	$this->mobatkeluar->insertData("jurnal",$d_jurnal);
	
        foreach($this->cart->contents() as $items){
            $d_detail['id_transaksi'] = $temp;
            $d_detail['kode_obat'] = $items['id'];
            $d_detail['jumlah_obatkeluar'] = $items['qty'];
            $d_detail['harga_obatkeluar'] = $items['price'];
	    $d_detail['tgl_transaksi'] = $date;
            $this->mobatkeluar->insertData("obat_keluardetil",$d_detail);

            $kode=$d_detail['kode_obat'];
	    $counter=$d_detail['jumlah_obatkeluar'];
	    $this->mobatkeluar->manualQuery("CALL sp_updatestok ($counter,'".$kode."');");
            
	    $obat['safety_stok'] = $this->mobatkeluar->getSafetyStok($d_detail['kode_obat']);
	    $obat['stok'] = $this->mobatkeluar->getKurangStok($d_detail['kode_obat'],$d_detail['jumlah_obatkeluar']);
            $key['kode_obat'] = $d_detail['kode_obat'];
            $this->mobatkeluar->updateData("obat",$obat,$key);
            
            $obat['rop'] = $this->mobatkeluar->getRop($d_detail['kode_obat']);
	    $key['kode_obat'] = $d_detail['kode_obat'];
	    $this->mobatkeluar->updateData("obat",$obat,$key);   

	$stok = $this->mobat->getStokObatById($d_detail['kode_obat']);
	$rop = $this->mobat->getRopObatById($d_detail['kode_obat']);
	if ($stok<$rop){
	$query2=$this->db->query('select no_hp from petugas where sms_gateway=1');
	foreach($query2->result() as $row)
            {
		$this->db->query("INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('".$row->no_hp."','Obat ".$d_detail['kode_obat']." Telah mencapai Reorder Point segera lakukan pemesanan ke supplier ', 'SMS GATEWAY')");
            }
	}
	
        }
        $this->session->unset_userdata('limit_add_cart');
        $this->cart->destroy();
        redirect('obatkeluar/index');
    }

    function deteleObatKadaluarsa() {
        $id_jurnal=  $this->mlaporan->getIdJurnal();
        
        $id_transaksi = $this->input->post('id_transaksi');
        $id_kadaluarsa = $this->mobatkeluar->getKodeKadaluarsa();
        $id_obat = $this->input->post('id_obat');
        $jumlah = $this->input->post('jumlah');
        $harga = $this->input->post('harga');
        $total=$jumlah*$harga;
        $d_master['id_transaksi'] = $id_kadaluarsa;
        $d_master['total'] = $total;
        $d_master['tanggal_transaksi'] = date("Y-m-d",strtotime($this->input->post('tanggal')));
	$d_master['id_petugas'] = $this->input->post('id_petugas');
        $d_master['harga'] = $harga;
        $d_master['kode_obat'] = $id_obat;
        $d_master['jumlah_obat'] = $jumlah;
        $d_master['id_transaksimasuk'] = $id_transaksi;
        $this->mobatkeluar->insertData("obat_kadaluarsa",$d_master);

        $d_jurnal2['id_jurnal']=  $id_jurnal;
	$d_jurnal2['id_transaksikadaluarsa'] = $id_kadaluarsa;
	$d_jurnal2['tgl_transaksi'] = date("Y-m-d",strtotime($this->input->post('tanggal')));
	$d_jurnal2['kode_akun'] = ("113");
	$d_jurnal2['debet'] =  $total;
	$this->mobatkeluar->insertData("jurnal",$d_jurnal2);	

        $d_jurnal['id_jurnal']=  $id_jurnal;
	$d_jurnal['id_transaksikadaluarsa'] = $id_kadaluarsa;
	$d_jurnal['tgl_transaksi'] = date("Y-m-d",strtotime($this->input->post('tanggal')));
	$d_jurnal['kode_akun'] = ("112");
	$d_jurnal['kredit'] = $total;
	$this->mobatkeluar->insertData("jurnal",$d_jurnal);
        
        $obat['stok'] = $this->mobatkeluar->getKurangStok($id_obat,$jumlah);
            $key['kode_obat'] = $id_obat;
            $this->mobatkeluar->updateData("obat",$obat,$key);
        
        $this->mobatkeluar->updateStok($id_obat,$id_transaksi);
        redirect('obat/obatkadaluarsa');
	
}
   }
