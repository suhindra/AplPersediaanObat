<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of smsgateway
 *
 * @author suhindra
 */
class smsgateway extends CI_Controller {
    //put your code here
function __construct(){
        parent::__construct();
	
        $this->load->model('MObat');
        $this->load->model('MObatKeluar');
       
    }
    function cekPulsa() {

exec("gammu getussd *888#", $hasil);
 

for ($i=0; $i<=count($hasil)-1; $i++)
{
if (substr_count($hasil[$i], 'Service reply') > 0) $index = $i;
}
 

echo $hasil;

    }
    function inbox() {
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/inbox');
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_inbox');
    }
    
     function outbox(){
     
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/outbox');
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_outbox');
        ;
    }
    
    function sentitems(){
     
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/sentitems');
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_sentitems');
        ;
    }
    
    function getListInbox() {
        $this->datatables->select('id, SenderNumber, TextDecoded,ReceivingDateTime ')
                           ->from('inbox');
        
                   echo $this->datatables->generate();
        
    }
    function getListOutBox(){
	 $this->datatables->select('id, DestinationNumber, TextDecoded, ')
                         ->from('outbox');
	
	           echo $this->datatables->generate();

	}
     function getListSentItems(){
	 $this->datatables->select('id, DestinationNumber, TextDecoded, SendingDateTime')
                         ->from('sentitems');
	
	           echo $this->datatables->generate();

}

function kirimSmsGateway(){
	$q=$this->db->query('select a.kode_obat, b.nama_obat, a.stok , a.tgl_kadaluarsa from obat_masukdetil a, obat b where a.kode_obat = b.kode_obat AND a.tgl_kadaluarsa <= CURDATE() AND a.stok > 0 ');
	$arrResult = Array();
	$ke=0;
	foreach($q->result() as $k)
            {
		$arrResult[$ke++]=$k->nama_obat; 
            }
	$kadaluarsa = implode(", ",$arrResult);
	$tanggal = date("d-m-Y");	
	$query2=$this->db->query('select no_hp from petugas where sms_gateway=1');
	foreach($query2->result() as $row)
            {
		$this->db->query("INSERT INTO outbox(DestinationNumber, TextDecoded, CreatorID) VALUES ('".$row->no_hp."','Daftar obat yang kadaluarsa sampai tanggal ".$tanggal." ".$kadaluarsa." Lihat selengkapnya http://localhost/AplPersediaanObat/', 'SMS GATEWAY')");
            }
}
}
?>
