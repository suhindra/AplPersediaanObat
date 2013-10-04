<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mpendaftaran
 *
 * @author suhindra
 */
class mpendaftaran extends CI_Model{
    //put your code here
        function getKodePendaftaran()
    {
        $q = $this->db->query("select MAX(RIGHT(id_pendaftaran,7)) as kd_max from pendaftaran");
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
        return "PD-".$kd;
    }
    
    
    function getNoUrutPendaftaran()
    {
        $q = $this->db->query("select MAX(RIGHT(no_urut,3)) as kd_max from pendaftaran where tgl_pendaftaran = curdate()");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return $kd;
    }
    
    
    function insertPendaftaran($data){
        $query = $this->db->insert('pendaftaran',$data);
        return $query;
    }
}

?>
