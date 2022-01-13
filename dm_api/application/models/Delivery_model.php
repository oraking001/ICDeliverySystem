<?php
class Delivery_model extends CI_Model
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('session');
    }

    function insertdata($data, $table)
    {
        if($this->db->insert($table, $data))
        {
            return $this->db->insert_id();
        }else{
            return 0;
        }
    }

    function insertvendor($data, $table)
    {
        if($this->db->insert($table, $data))
        {
            return $this->db->insert_id();
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

    function get_data($table,$hub_id,$status)
    {   
        $this->db->select('tbl_delivery.*,tbl_vendor.vendor_name,tbl_city.city_name,tbl_hub.hub_name,tbl_login.sau_name');    
        $this->db->from($table);
        $this->db->join('tbl_vendor','tbl_vendor.id = tbl_delivery.vendor_id');
        $this->db->join('tbl_city','tbl_city.id= tbl_delivery.city');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.hub');
        $this->db->join('tbl_login','tbl_login.sa_id= tbl_delivery.user_id');
      //  $this->db->where_in('tbl_delivery.status',[0,1]);
        if($hub_id != ''){
            $this->db->where('tbl_delivery.hub',$hub_id);
      }
        if($status != ''){
            $this->db->where('tbl_delivery.status',$status);
        }
        
        $this->db->order_by("tbl_delivery.id", "desc");
        $query = $this->db->get();
        //return $query->result();    
        foreach ($query->result() as $r)
        {
            $destination_hub = $r->destination_hub;
            if($destination_hub != 0){
                $this->db->select('*');    
                $this->db->from('tbl_hub');
                $this->db->where('id',$destination_hub);
                $que = $this->db->get();
                foreach ($que->result() as $q)
                {
                    $dhub = $q->hub_name;
                }
            }else{
                $dhub = '';
            }
            
            $data[] = array(
                'id' => $r->id,
                'receipt_no' => $r->receipt_no,
                'logi_type' => $r->logi_type,
                'vendor_name' => $r->vendor_name,
                'pack_type' => $r->pack_type,
                'hub_name' => $r->hub_name,
                'pack_weight' => $r->pack_weight,
                'city_name' => $r->city_name,
                'destination_hub' => $dhub,
                'status' => $r->status,
                'rec_name' => $r->rec_name,
                'shipping_fee' => $r->shipping_fee,
                'rec_phone' => $r->rec_phone,
                'collect_amt' => $r->collect_amt,
                'rec_address' => $r->rec_address,
                'Created_at' => $r->Created_at,
                'pack_desc' => $r->pack_desc,
                'sau_name' => $r->sau_name,
                'transit_bag' => $r->transit_bag,
            );
        }

        return $data;
    }

    function get_dropdown($table)
    {   
        $this->db->select('*');    
        $this->db->from($table);
        if($table == 'tbl_hub'){
            $hubs = explode(',',$this->session->hubs);
            $this->db->where_in('tbl_hub.id',$hubs);
        }
        if($table == 'tbl_login'){
            $this->db->where('tbl_login.user_type',3);
        }
        $query = $this->db->get();
        return $query->result();    
    }

    function get_amount($city_id)
    {   
        $this->db->select('tbl_city.region,tbl_tier.Amount as tier_amt,tbl_zone.Amount as zone_amt');    
        $this->db->from('tbl_city');
        $this->db->join('tbl_tier','tbl_tier.id= tbl_city.tier_id');
        $this->db->join('tbl_zone','tbl_zone.id= tbl_city.zone_id');
        $this->db->where('tbl_city.id',$city_id);
        $query = $this->db->get();
        $amt = 0;
        if($query->num_rows() > 0){
            foreach ($query->result() as $r)
            {
                $amt = $r->tier_amt + $r->zone_amt;
                $data = array(
                    'amt' => $amt,
                    'region' => $r->region,
                );

            }
            return $data;
        }else{
            return $amt;
        }
        
    }

    function get_details($vendor_id)
    {   
        $this->db->select('*');    
        $this->db->from('tbl_vendor');
        $this->db->where('id',$vendor_id);
        $query = $this->db->get();
        return $query->result();    
    }

    function print_data($id)
    {   
        $this->db->select('tbl_delivery.*,tbl_vendor.vendor_name,tbl_vendor.vendor_email,tbl_city.city_name,tbl_hub.hub_name');    
        $this->db->from('tbl_delivery');
        $this->db->join('tbl_vendor','tbl_vendor.id = tbl_delivery.vendor_id');
        $this->db->join('tbl_city','tbl_city.id= tbl_delivery.city');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.hub');
        $this->db->where('tbl_delivery.id',$id);
        $query = $this->db->get();
        return $query->result();    
    }

    function insert($data)
    {
        $this->db->insert_batch('tbl_delivery', $data);
    }
}