<?php
class Transit_model extends CI_Model
{
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
        $this->db->select('tbl_delivery.*,sum(tbl_delivery.pack_weight) as weight,tbl_vendor.vendor_name,tbl_city.city_name,tbl_hub.hub_name,tbl_login.sau_name,t1.hub_name as destination_hub');    
        $this->db->from($table);
        $this->db->join('tbl_vendor','tbl_vendor.id = tbl_delivery.vendor_id');
        $this->db->join('tbl_city','tbl_city.id= tbl_delivery.city');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.hub');
        $this->db->join('tbl_hub t1','t1.id= tbl_delivery.destination_hub');
        $this->db->join('tbl_login','tbl_login.sa_id= tbl_delivery.user_id');
        $this->db->where('tbl_delivery.status',1);
        $this->db->group_by('tbl_delivery.transit_bag'); 
        $this->db->order_by("tbl_delivery.id", "desc");
        $query = $this->db->get();
       // return $query->result();    
       $result = $query->result_array();
       foreach($result as $r){
           $tracking_details = $this->print_list($r['transit_bag']);
           $data[] = array(
               'transit_bag' => $r['transit_bag'],
               'hub_name' => $r['hub_name'],
               'destination_hub' => $r['destination_hub'],
               'weight' => $r['weight'],
               'Created_at' => $r['Created_at'],
               'sau_name' => $r['sau_name'],
               'updated_at' => $r['updated_at'],
               'status' => $r['status'],
               'tracking_details' => $tracking_details,
           );
       }
       return $data;
    }

    function get_transit_data($table,  $hub_id, $transit_bag)
    {   
        $this->db->select('tbl_delivery.*,tbl_vendor.vendor_name,tbl_vendor.vendor_email,tbl_city.city_name,tbl_hub.hub_name');    
        $this->db->from('tbl_delivery');
        $this->db->join('tbl_vendor','tbl_vendor.id = tbl_delivery.vendor_id');
        $this->db->join('tbl_city','tbl_city.id= tbl_delivery.city');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.hub');
        $this->db->where('tbl_delivery.status',1);
        $this->db->where('tbl_delivery.destination_hub',$hub_id);
        $this->db->where('tbl_delivery.transit_bag',$transit_bag);
       
        $query = $this->db->get();
        return $query->result();    
    }

    function print_data($transit_bag)
    {   
        $this->db->select('tbl_delivery.*,tbl_vendor.vendor_name,tbl_vendor.vendor_email,tbl_city.city_name,tbl_hub.hub_name');    
        $this->db->from('tbl_delivery');
        $this->db->join('tbl_vendor','tbl_vendor.id = tbl_delivery.vendor_id');
        $this->db->join('tbl_city','tbl_city.id= tbl_delivery.city');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.hub');
        $this->db->where('tbl_delivery.transit_bag',$transit_bag);
        $query = $this->db->get();
        return $query->result();    
    }

    function print_list($transit_bag)
    {   
        $this->db->select('tbl_delivery.*,tbl_vendor.vendor_name,tbl_vendor.vendor_email,tbl_city.city_name,tbl_hub.hub_name');    
        $this->db->from('tbl_delivery');
        $this->db->join('tbl_vendor','tbl_vendor.id = tbl_delivery.vendor_id');
        $this->db->join('tbl_city','tbl_city.id= tbl_delivery.city');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.hub');
        $this->db->where('tbl_delivery.transit_bag',$transit_bag);
        $query = $this->db->get();
        return $query->result();    
    }
}
?>