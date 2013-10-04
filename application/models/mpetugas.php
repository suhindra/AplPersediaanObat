<?php


class MPetugas extends CI_Model{
    function __construct(){
        parent::__construct();
    }


    function getAllPetugas(){
        return $this->db->query("select * from petugas ")->result();
   }


    public function getPetugasById($id){
        $this->db->where('id_petugas',$id);
        $query = $this->db->get('petugas');
        return $query->result();
    }





    function insertPetugas($data){
        $query = $this->db->insert('petugas',$data);
        return $query;
    }



    function updatePetugas($id,$edit){
        $this->db->where('id_petugas',$id);
        $update = $this->db->update('petugas',$edit);
        return $update;
    }



    function deletePetugas($id){
        $this->db->where('id_petugas',$id);
        $delete = $this->db->delete('petugas');
        return $delete;
    }



    function getKodePetugas()
    {
        $q = $this->db->query("select MAX(RIGHT(id_petugas,7)) as kd_max from petugas");
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
        return "PT-".$kd;
    }


}
