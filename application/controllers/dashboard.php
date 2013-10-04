<?php 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author suhindra
 */
class Dashboard extends CI_Controller{
	function __construct(){
	parent:: __construct();
	$post_array = $this->session->userdata('session_data');
	if ($post_array['is_login'] != true ){
	redirect('user/akses');
	}
	$this->load->model('mdashboard');
}
	function index(){
	$temp=0;
	$query = $this->db->select('stok, nama_obat')
    			  ->get('obat');
	foreach($query->result_array() as $row)
	{
     	$dataset1[] = array($temp, $row['stok']);
	$dataset2[] = array($temp, $row['nama_obat'] );
	$temp++;
	}
	$data=array( 
	'dataset1' => $dataset1,
	'dataset2' => $dataset2,
	'data_kadaluarsa' => $this->mdashboard->getKadaluarsaObat(),
	'data_order'      => $this->mdashboard->getOrderObat(),
	'jumlah_reorder'  => $this->mdashboard->jumlahReorder(),
	'jumlah_kadaluarsa' => $this->mdashboard->jumlahKadaluarsa()
	);
	
        $this->load->view('element/loading');
	$this->load->view('element/left');	
	$this->load->view('element/header');
        $this->load->view('pages/chart.php',$data);
        $this->load->view('element/footer');
	$this->load->view('element/javascript');
       	$this->load->view('script/js_chart');
        ;
    }
	
	function akses(){
	$this->load->view('pages/404');

}




}
