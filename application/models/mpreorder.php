<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mpreorder
 *
 * @author suhindra
 */
class mpreorder extends CI_Model {
    //put your code here
    function __construct(){
        parent::__construct();

    }

    function getDetailPreorder($id){
	return $this->db->query("select a.*, b.nama_obat from preorder_detil a, obat b where id_preorder='".$id."' AND a.id_obat=b.kode_obat")->result();
    }
    function getKodePreorder()
    {
        $q = $this->db->query("select MAX(RIGHT(id_preorder,7)) as kd_max from preorder");
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
        return "PO-".$kd;
    }

    }

?>
