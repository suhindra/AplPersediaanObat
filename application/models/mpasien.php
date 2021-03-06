<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MPasien
 *
 * @author suhindra
 */
class MPasien extends CI_Model{
    function __construct(){
        parent::__construct();
    }


    function getAllPasien(){
        return $this->db->query("select * from pasien ")->result();
   }


    public function getPasienById($id){
        $this->db->where('id_pasien',$id);
        $query = $this->db->get('pasien');
        return $query->result();
    }





    function insertPasien($data){
        $query = $this->db->insert('pasien',$data);
        return $query;
    }



    function updatePasien($id,$edit){
        $this->db->where('id_pasien',$id);
        $update = $this->db->update('pasien',$edit);
        return $update;
    }



    function deletePasien($id){
        $this->db->where('id_pasien',$id);
        $delete = $this->db->delete('pasien');
        return $delete;
    }



    function getKodePasien()
    {
        $q = $this->db->query("select MAX(RIGHT(id_pasien,7)) as kd_max from pasien");
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
        return "PS-".$kd;
    }


}
