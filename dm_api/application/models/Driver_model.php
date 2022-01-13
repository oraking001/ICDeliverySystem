<?php
class Driver_model extends CI_Model
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

    
    function get_data($table,$hub_id)
    {   
        $this->db->select('tbl_delivery.*,tbl_vendor.vendor_name,tbl_vendor.vendor_email,tbl_city.city_name,tbl_hub.hub_name');    
        $this->db->from('tbl_delivery');
        $this->db->join('tbl_vendor','tbl_vendor.id = tbl_delivery.vendor_id');
        $this->db->join('tbl_city','tbl_city.id= tbl_delivery.city');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.hub');
        $this->db->where_in('tbl_delivery.status',['2','0']);
        if($hub_id != ''){
            $this->db->where('tbl_delivery.hub',$hub_id);
        }
       
        $query = $this->db->get();
        return $query->result();    
    }

    function get_driversheet_data($table)
    {   
        $this->db->select('tbl_delivery.*,sum(tbl_delivery.pack_weight) as weight,tbl_vendor.vendor_name,tbl_city.city_name,tbl_hub.hub_name,tbl_login.sau_name,tl.sau_FName as driver_name,t1.hub_name as destination_hub');    
        $this->db->from($table);
        $this->db->join('tbl_vendor','tbl_vendor.id = tbl_delivery.vendor_id');
        $this->db->join('tbl_city','tbl_city.id= tbl_delivery.city');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.hub');
        $this->db->join('tbl_hub t1','t1.id= tbl_delivery.destination_hub');
        $this->db->join('tbl_login','tbl_login.sa_id= tbl_delivery.user_id');
        $this->db->join('tbl_login tl','tl.sa_id= tbl_delivery.driver_id');
        $this->db->where('tbl_delivery.status',4);
        $this->db->group_by('tbl_delivery.driver_sheet'); 
        $this->db->order_by("tbl_delivery.id", "desc");
        $query = $this->db->get();
       // return $query->result();    
       $result = $query->result_array();
       foreach($result as $r){
           $tracking_details = $this->print_list($r['driver_sheet']);
           $data[] = array(
               'driver_sheet' => $r['driver_sheet'],
               'hub_name' => $r['hub_name'],
               'destination_hub' => $r['destination_hub'],
               'weight' => $r['weight'],
               'Created_at' => $r['Created_at'],
               'sau_name' => $r['sau_name'],
               'delivery_at' => $r['delivery_at'],
               'driver_name' => $r['driver_name'],
               'status' => $r['status'],
               'tracking_details' => $tracking_details,
           );
       }
       return $data;
    }

    function print_list($driver_sheet)
    {   
        $this->db->select('tbl_delivery.*,tbl_vendor.vendor_name,tbl_vendor.vendor_email,tbl_city.city_name,tbl_hub.hub_name');    
        $this->db->from('tbl_delivery');
        $this->db->join('tbl_vendor','tbl_vendor.id = tbl_delivery.vendor_id');
        $this->db->join('tbl_city','tbl_city.id= tbl_delivery.city');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.hub');
        $this->db->where('tbl_delivery.driver_sheet',$driver_sheet);
        $query = $this->db->get();
        return $query->result();    
    }

    function get_driver_delivery($table_name,$vendor_id)
    {   
        $this->db->select('tbl_delivery.*,tbl_vendor.vendor_name,tbl_vendor.vendor_email,tbl_city.city_name,tbl_hub.hub_name');    
        $this->db->from('tbl_delivery');
        $this->db->join('tbl_vendor','tbl_vendor.id = tbl_delivery.vendor_id');
        $this->db->join('tbl_city','tbl_city.id= tbl_delivery.city');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.hub');
        $this->db->where('tbl_delivery.driver_id',$this->session->userid);
        $this->db->where('tbl_delivery.status',4);
        if($vendor_id != 0){
            $this->db->where('tbl_delivery.vendor_id',$vendor_id);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        $data=array();
       foreach($result as $r){
            $data[] = array(
                'id' => $r['id'],
                'customer_name' => $r['vendor_name'],
                'tracking_number' => $r['receipt_no'],
                'address' => $r['rec_address'],
                'phone' => $r['rec_phone'],
            );
       }
       return $data;  
    }

}
?>