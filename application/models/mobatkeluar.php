<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mobatkeluar
 *
 * @author suhindra
 */
class Mobatkeluar extends CI_Model{
    function __construct(){
        parent::__construct();

    }
	
   function getDetailObatKeluar($id){
	return $this->db->query("select * from obat_keluardetil where id_transaksi='".$id."'")->result();

	}
   function getHarga($kode,$counter){
       $this->db->query("CALL sp_fifo ($counter,'".$kode."',@return);");
       $q=$this->db->query( "SELECT @return as harga");
       foreach($q->result() as $k)
            {
                $harga = ((int)$k->harga);
                
            }
            return $harga;
   }
   function getKodeObatKeluar()
    {
        $q = $this->db->query("select MAX(RIGHT(id_transaksi,7)) as kd_max from obat_keluar");
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
        return "OK-".$kd;
    }
	
    function getKodeKadaluarsa() {
         $q = $this->db->query("select MAX(RIGHT(id_transaksi,7)) as kd_max from obat_kadaluarsa");
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
        return "OE-".$kd;
    }
            
   function getKurangStok($kode_obat,$kurang)
    {
        $q = $this->db->query("select stok from obat where kode_obat='".$kode_obat."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok - $kurang;
        }
        return $stok;
    }


   

    function getSafetyStok($kode_obat){
	$qavg = $this->db->query("SELECT SUM(jumlah_obatkeluar) / COUNT(DISTINCT tgl_transaksi) AS average from obat_keluardetil where kode_obat='".$kode_obat."' ");
	$avg = "";
	foreach($qavg->result() as $davg)
        {
            $avg = $davg->average;
        }

	$qmax = $this->db->query("SELECT SUM(jumlah_obatkeluar) as max FROM obat_keluardetil where kode_obat='".$kode_obat."' group by tgl_transaksi order by max desc limit 1");
	$max = "";
	foreach($qmax->result() as $dmax)
        {
            $max = $dmax->max;
        }

	$safety_stok = (($max-$avg)*1) ;
	
        return $safety_stok;
}


    function getRop($kode_obat){
	$qavg = $this->db->query("SELECT SUM(jumlah_obatkeluar) / COUNT(DISTINCT tgl_transaksi) AS average from obat_keluardetil where kode_obat='".$kode_obat."' ");
	$avg = "";
	foreach($qavg->result() as $davg)
        {
            $avg = $davg->average;
        }

	$qst = $this->db->query("select safety_stok from obat where kode_obat='".$kode_obat."'");
        $st = "";
        foreach($qst->result() as $dst)
        {
            $st = $dst->safety_stok;
        }

	
	$rop = (1*$avg)+$st;
	
        return $rop;

}

    function getKembalikanStok($kd_barang)
    {
        $q = $this->db->query("select jumlah_obat from obat where kode_obat='".$kode_obat."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $jumlah_obat = $d->jumlah_obat;
        }
        return $jumlah_obat;
    }
    
    function updateStok($id_obat,$id_transaksi) {
        $this->db->query('UPDATE `obat_masukdetil` SET `stok`=0 WHERE id_transaksi="'.$id_transaksi.'" AND kode_obat="'.$id_obat.'"');
    }

    function getAllData($table)
    {
        return $this->db->get($table);
    }

    function getAllDataLimited($table,$limit,$offset)
    {
        return $this->db->get($table, $limit, $offset);
    }

    function getSelectedDataLimited($table,$data,$limit,$offset)
    {
        return $this->db->get_where($table, $data, $limit, $offset);
    }

    function getSelectedData($table,$data)
    {
        return $this->db->get_where($table, $data);
    }

    function updateData($table,$data,$field_key)
    {
        $this->db->update($table,$data,$field_key);
    }

    function deleteData($table,$data)
    {
        $this->db->delete($table,$data);
    }

    function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    function manualQuery($q)
    {
        return $this->db->query($q);
    }
}
