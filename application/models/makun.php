<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of makun
 *
 * @author suhindra
 */
class makun extends CI_Model{
	function __construct(){
        parent::__construct();
    }

	function getAllAkun(){
	return $this->db->query('select * from coa')->result();
	}
	
	function getAkunById($kode_akun){
	return $this->db->query("select * from coa where kode_akun = '".$kode_akun."'")->result();
	}	

	function updateAkun($id,$edit){
	$this->db->where('kode_akun',$id);
	$update = $this->db->update('coa',$edit);
	return $update;
	}
}
