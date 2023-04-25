<?php
class User_model extends CI_model{

    public function create($formArray){

        $this->db->insert('users',$formArray);
        return $id=$this->db->insert_id();
    }
    public function all(){
       return $result=$this->db->order_by('id','ASC')->get('users')->result_array();
    }

    public function getRow($id){
        $this->db->where('id',$id);
        return $row= $this->db->get('users')->row_array();
    }

    function update($id,$formArray){
        $this->db->where('id',$id);
        $this->db->update('users',$formArray);
        return $id;
    }
    function delete($id){
        $this->db->where("id",$id);
        $this->db->delete('users');
    }
}

?>