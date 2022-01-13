<?php
class City_model extends CI_Model
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
        $this->db->select('tbl_city.*,tbl_tier.Tier_Name,tbl_zone.zone_name');    
        $this->db->from($table);
        $this->db->join('tbl_tier','tbl_tier.id= tbl_city.tier_id');
        $this->db->join('tbl_zone','tbl_zone.id= tbl_city.zone_id');
        $query = $this->db->get();
        return $query->result();    
    }

    function get_dropdown($table)
    {   
        $this->db->select('*');    
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();    
    }
}