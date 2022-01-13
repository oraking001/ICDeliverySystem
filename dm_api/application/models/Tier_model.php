<?php
class Tier_model extends CI_Model
{

    function insertdata($data, $table)
    {
        if($this->db->insert($table, $data))
        {
            return 1;
        }else{
            return 0;
        }
    }

    function updatedata($data, $id, $table)
    {
        $this->db->where('id', $id);

        if($this->db->update($table, $data))
        {
            return 1;
        }else{
            return 0;
        }
    }

    function get_data($table)
    {   
        $this->db->select('*');    
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();    
    }
}