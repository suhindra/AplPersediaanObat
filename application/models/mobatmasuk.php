<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mobatmasuk
 *
 * @author suhindra
 */
class Mobatmasuk extends CI_Model{
    function __construct(){
        parent::__construct();

    }
	
    function getDetailObatMasuk($id){
	return $this->db->query("select * from obat_masukdetil where id_transaksi='".$id."'")->result();

	}

    function getKodeObatMasuk()
    {
        $q = $this->db->query("select MAX(RIGHT(id_transaksi,7)) as kd_max from obat_masuk");
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
        return "OM-".$kd;
    }
	

    function getNamaObatById($id)
	{
	return $this->db->query("select nama_obat from obat where kode_obat='".$id."' ")->result();
	}
   

   public function getKurangStok($kode_obat,$kurang)
    {

        $q = $this->db->query("select jumlah_obat from obat where kode_obat='".$kode_obat."'");
        $jumlah_obat = "";
        foreach($q->result() as $d)
        {
            $jumlah_obat = $d->jumlah_obat - $kurang;
        }
        return $jumlah_obat;
    }

    public function getTambahStok($kode_obat,$tambah)
    {
        $q = $this->db->query("select stok from obat where kode_obat='".$kode_obat."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok + $tambah;
        }
        return $stok;
    }

    public function getKembalikanStok($kd_barang)
    {
        $q = $this->db->query("select jumlah_obat from obat where kode_obat='".$kode_obat."'");
        $stok = "";
        foreach($q->result() as $d)
        {
            $jumlah_obat = $d->jumlah_obat;
        }
        return $jumlah_obat;
    }

    public function getAllData($table)
    {
        return $this->db->get($table);
    }

    public function getAllDataLimited($table,$limit,$offset)
    {
        return $this->db->get($table, $limit, $offset);
    }

    public function getSelectedDataLimited($table,$data,$limit,$offset)
    {
        return $this->db->get_where($table, $data, $limit, $offset);
    }

    public function getSelectedData($table,$data)
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
