<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MLaporan
 *
 * @author suhindra
 */
class MLaporan extends CI_Model{
    function __construct(){
        parent::__construct();
    }

     function getIdJurnal() {
         $q = $this->db->query("select MAX(RIGHT(id_jurnal,7)) as kd_max from jurnal");
        $kd = "";
	        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%07s", $tmp);
            }
        }
        else
        {
            $kd = "0000001";
        }
        return "JU-".$kd;
    }
    function getJurnal($bulan,$tahun){
        return $this->db->query("SELECT A . *, B.* , (SELECT COUNT( id_jurnal ) FROM jurnal WHERE id_jurnal = A.id_jurnal) AS jumlah FROM jurnal  A, coa B where A.kode_akun = B.kode_akun AND MONTH(A.tgl_transaksi) = '".$bulan."' AND YEAR(A.tgl_transaksi) = '".$tahun."' ORDER BY A.no")->result();

   }

   function getLapObatMasuk($bulan,$tahun){
        return $this->db->query("select a.*, b.*, c.*,d.* from obat_masukdetil a, obat b, satuan c, obat_masuk d where a.kode_obat=b.kode_obat AND a.id_transaksi=d.id_transaksi And b.kode_satuan=c.kode_satuan AND MONTH(d.tgl_transaksi) = '".$bulan."' AND YEAR(d.tgl_transaksi) = '".$tahun."'")->result();

   }

   function getLapObatKeluar($bulan,$tahun){
        return $this->db->query("select a.*, b.*, c.*, d.* from obat_keluardetil a, obat b, satuan c, obat_keluar d where a.kode_obat=b.kode_obat AND a.id_transaksi=d.id_transaksi AND b.kode_satuan=c.kode_satuan AND MONTH(d.tgl_transaksi) = '".$bulan."' AND YEAR(d.tgl_transaksi) = '".$tahun."'")->result();

   }

   function getBukuBesarTitipan($bulan,$tahun){
	return $this->db->query("SELECT * FROM jurnal  where kode_akun = '113' AND MONTH(tgl_transaksi) = '".$bulan."' AND YEAR(tgl_transaksi) = '".$tahun."' ORDER BY no")->result();
   }

   function getBukuBesarPersediaan($bulan,$tahun){
	return $this->db->query("SELECT * FROM jurnal  where kode_akun = '112' AND MONTH(tgl_transaksi) = '".$bulan."' AND YEAR(tgl_transaksi) = '".$tahun."' ORDER BY no")->result();
   }

      
  function getSaldoTitipan($bulan,$tahun){
        return $this->db->query("SELECT SUM( debet ) as debet, SUM( kredit ) as kredit FROM jurnal WHERE MONTH( tgl_transaksi ) <  '".$bulan."' AND YEAR( tgl_transaksi ) <=  '".$tahun."' AND kode_akun =  '113'")->result();
  }
  function getSaldoPersediaan($bulan,$tahun) {
      return $this->db->query("SELECT SUM( debet ) as debet, SUM( kredit ) as kredit FROM jurnal WHERE MONTH( tgl_transaksi ) <  '".$bulan."' AND YEAR( tgl_transaksi ) <=  '".$tahun."' AND kode_akun =  '112'")->result();
      
  }
  
  function getPersediaan(){
   	$this->db->where('a.kode_satuan = b.kode_satuan');
	$query = $this->db->get('obat a, satuan b');
	return $query->result();
   }

   function getOutbox(){
	$this->db->select('*');
	$query=$this->db->get('outbox');
	return $query;
	
	}

   function getSentItems(){
	$this->db->select('*');
	$query=$this->db->get('sentitems');
	return $query;
	
	}

}
