<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MSupplier
 *
 * @author suhindra
 */
class MSupplier extends CI_Model{
    function __construct(){
        parent::__construct();
    }

//    GET DATA
    function getAllSupplier(){
        return $this->db->query("select * from supplier ")->result();
   }

//    GET DATA BY ID
    public function getSupplierById($id){
        $this->db->where('id_supplier',$id);
        $query = $this->db->get('supplier');
        return $query->result();
    }



//    INSERT DATA

    function insertSupplier($data){
        $query = $this->db->insert('supplier',$data);
        return $query;
    }


//    UPDATE DATA
    function updateSupplier($id,$edit){
        $this->db->where('id_supplier',$id);
        $update = $this->db->update('supplier',$edit);
        return $update;
    }


//    DELETE DATA
    function deleteSupplier($id){
        $this->db->where('id_supplier',$id);
        $delete = $this->db->delete('supplier');
        return $delete;
    }


//    KODE BARANG
    function getKodeSupplier()
    {
        $q = $this->db->query("select MAX(RIGHT(id_supplier,7)) as kd_max from supplier");
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
        return "SP-".$kd;
    }


}
