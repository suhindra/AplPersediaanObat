<?php 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdashboard
 *
 * @author suhindra
 */
class MDashboard extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
    function getKadaluarsaObat(){
	return $this->db->query('select a.kode_obat, b.nama_obat, a.stok , a.tgl_kadaluarsa from obat_masukdetil a, obat b where a.kode_obat = b.kode_obat AND a.tgl_kadaluarsa <= CURDATE() AND a.stok > 0 ')->result();
	}


    function getOrderObat(){
	return $this->db->query("select * from obat where stok < rop")->result();
	}

    function jumlahKadaluarsa(){
	return $this->db->query('select sum(stok) as jumlah from obat_masukdetil where  tgl_kadaluarsa <= CURDATE() AND stok > 0  ')->result();
	}
    function jumlahReorder(){
	return $this->db->query('select count(*) as jumlah from obat where stok < rop')->result();
	}
}

