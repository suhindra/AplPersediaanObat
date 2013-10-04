<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MObat
 *
 * @author suhindra
 */
class MObat extends CI_Model{
    function __construct(){
        parent::__construct();
    }


    function getObatOrder(){
	return $this->db->query("select * from obat where stok < rop")->result();

	}
function getAllObat(){
   	$this->db->where('a.kode_satuan = b.kode_satuan');
	$query = $this->db->get('obat a, satuan b');
	return $query->result();
}
   function getAllTransaksi(){
	$query = $this->db->query('select * from obat_masukdetil');
	return $query->result();
}
   function getDetailObat($id){
	return $this->db->query("select * from obat_masukdetil where stok > 0 AND kode_obat='".$id."'")->result();	
	}

   function getObatById($id){
        $this->db->where('kode_obat',$id);
        $query = $this->db->get('obat');
        return $query->result();
    }

    function getKategoriById($id){
	$this->db->where('kode_satuan',$id);
	$query = $this->db->get('satuan');
	return $query->result();
    }

    public function getSatuanById($id){
        $this->db->where('kode_satuan',$id);
        $query = $this->db->get('satuan');
        return $query->result();
    }

    function getStokObatById($id){
	$q = $this->db->query("select sum(stok) as stok from obat_masukdetil where kode_obat='".$id."' and tgl_kadaluarsa > curdate();");
        $stok = "";
        foreach($q->result() as $d)
        {
            $stok = $d->stok;
        }
        return $stok;
	}

    function getRopObatById($id){
	$q = $this->db->query("select rop from obat where kode_obat='".$id."'");
        $rop = "";
        foreach($q->result() as $d)
        {
            $rop = $d->rop;
        }
        return $rop;
	}

    function getNamaObatById($id){
	$q = $this->db->query("select nama_obat from obat where kode_obat='".$id."'");
        $nama_obat = "";
        foreach($q->result() as $d)
        {
            $nama_obat = $d->nama_obat;
        }
        return $nama_obat;
	}

    
    function getNamaSatuanById($id){
	return $this->db->query("select satuan from obat where kode_satuan='$id' ")->result();

	}


    function insertObat($data){
        $query = $this->db->insert('obat',$data);
        return $query;
    }

      function insertKategori($data){
        $query = $this->db->insert('satuan',$data);
        return $query;
    }


    function updateObat($id,$edit){
        $this->db->where('kode_obat',$id);
        $update = $this->db->update('obat',$edit);
        return $update;
    }

    function updateSatuan($id,$edit){
        $this->db->where('kode_satuan',$id);
        $update = $this->db->update('satuan',$edit);
        return $update;
    }


    function deleteObat($id){
        $this->db->where('kode_obat',$id);
        $delete = $this->db->delete('obat');
        return $delete;
    }

    function deleteKategori($id){
        $this->db->where('kode_satuan',$id);
        $delete = $this->db->delete('satuan');
        return $delete;
    }



    function getKodeObat()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_obat,7)) as kd_max from obat");
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
        return "OB-".$kd;
    }

    function getKodeSatuan()
    {
        $q = $this->db->query("select MAX(RIGHT(kode_satuan,7)) as kd_max from satuan");
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
        return "KS-".$kd;
    }

    function manualQuery($q)
    {
        return $this->db->query($q);
    }


}
