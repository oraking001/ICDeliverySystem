<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delivery extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Delivery_model');
        $this->load->library('session');
    }

    public function save_data()
    {
        $user_type = $this->input->post('user_type');
        $vendor_id = '';
        if($user_type == 'new'){
            $data = array(
                'vendor_name' => $this->input->post('vendor_name'),
                'vendor_phone' => $this->input->post('vendor_phone'),
                'vendor_email' => $this->input->post('vendor_email'),
                'user_id' => $this->session->userid,
            );
    
            $res = $this->Delivery_model->insertvendor($data, "tbl_vendor");

            $vendor_id = $res;
        }else{
            $vendor_id = $this->input->post('vendor_id');
        }

        $this->db->select('max(receipt_no) as last_receipt');
        $this->db->from('tbl_delivery');
        $res = $this->db->get()->row();

        if($res->last_receipt == '' || $res->last_receipt == NULL){
            $receipt_no = 23565889;
        }else{
            $receipt_no = $res->last_receipt + 1;
        }
        
        $data = array(
            'vendor_id' => $vendor_id,
            'rec_name' => $this->input->post('rec_name'),
            'rec_phone' => $this->input->post('rec_phone'),
            'rec_address' => $this->input->post('rec_address'),
            'pack_desc' => $this->input->post('pack_desc'),
            'pack_type' => $this->input->post('pack_type'),
            'logi_type' => $this->input->post('logi_type'),
            'pack_weight' => $this->input->post('pack_weight'),
            'dest_region' => $this->input->post('dest_region'),
            'city' => $this->input->post('city'),
            'hub' => $this->input->post('hub'),
            'shipping_fee' => $this->input->post('shipping_fee'),
            'collect_amt' => $this->input->post('collect_amt'),
            'user_id' => $this->session->userid,
            'Created_at' => date("Y-m-d h:i:s"),
            'receipt_no' => $receipt_no,
        );

        $res = $this->Delivery_model->insertdata($data, "tbl_delivery");

        echo $res;
    }

    function get_data()
    {
        $table_name	=$this->input->post('table_name');
        $hub_id	=$this->input->post('hub_id');
        $status	=$this->input->post('status');
        $data = $this->Delivery_model->get_data($table_name,$hub_id,$status);
      echo json_encode($data);
    }

    function get_dropdown()
    {
        $table_name	=$this->input->post('table_name');
        $data = $this->Delivery_model->get_dropdown($table_name);
      echo json_encode($data);
    }

    function get_amount()
    {
        $city_id = $this->input->post('city_id');
        $data = $this->Delivery_model->get_amount($city_id);
       echo json_encode($data);
    }

    function get_details()
    {
        $vendor_id	=$this->input->post('vendor_id');
        $data = $this->Delivery_model->get_details($vendor_id);
      echo json_encode($data);
    }

    function print_data()
    {
        $id	=$this->input->post('vendorId');
        $data['record'] = $this->Delivery_model->print_data($id);
        $data['barcode'] = $this->barcode($id);
        $data['qrcode'] = $this->qrcode($id);
        $this->load->view('receipt',$data);
    }

    //Barcode generation function, using Zend library
    function barcode($id)
    {
        $this->load->library('Zend');
        $this->zend->load('Zend/Barcode');
       
        $this->db->select('tbl_delivery.receipt_no');    
        $this->db->from('tbl_delivery');
        $this->db->where('id',$id);
        $res = $this->db->get();
        $result = $res->result_array();
        foreach($result as $r){
            $receipt_no = $r['receipt_no'];
        }

      //  $barcodeOptions = array('text' => 'ICL'.$res->receipt_no);
        $rendererOptions = array('imageType'          =>'png', 
                                        'horizontalPosition' => 'center', 
                                        'verticalPosition'   => 'middle');
            
      // $imageResource=Zend_Barcode::factory('code128', 'image', $barcodeOptions, $rendererOptions)->render();
        if (file_exists('uploads/'.$receipt_no.'.png')) 
        {
            unlink('uploads/'.$receipt_no.'.png');
        }
       $imageResource = Zend_Barcode::factory('code128', 'image', array('text'=>'ICL'.$receipt_no), array())->draw();
       imagepng($imageResource, 'uploads/'.$receipt_no.'.png');
     //  return $imageResource;

        return $receipt_no.'.png';
        
    }
    
    //qr-code generation function
    function qrcode($id){
            $this->load->library('ciqrcode');

            $this->db->select('tbl_delivery.receipt_no');    
            $this->db->from('tbl_delivery');
            $this->db->where('id',$id);
            $res = $this->db->get();
            $result = $res->result_array();
            foreach($result as $r){
                $receipt_no = $r['receipt_no'];
            }
            if (file_exists('uploads/'.'qr'.$receipt_no.'.png')) 
            {
                unlink('uploads/'.'qr'.$receipt_no.'.png');
            }
			$qr_image='qr'.$receipt_no.'.png';
			$params['data'] = 'ICL'.$receipt_no;
			$params['level'] = 'H';
			$params['size'] = 8;
            $params['savename'] ='uploads/'.$qr_image;
            
            if($this->ciqrcode->generate($params))
			{
				return $qr_image;	
			}
    }


    //function to import CSV file data
    function import_csv()
	{
        $this->load->library('csvimport');
        $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
        
        $this->db->select('max(receipt_no) as last_receipt');
        $this->db->from('tbl_delivery');
        $res = $this->db->get()->row();
        if($res->last_receipt == '' || $res->last_receipt == NULL){
            $receipt_no = 23565889;
        }else{
            $receipt_no = $res->last_receipt + 1;
        }
        $i = 0;
		foreach($file_data as $row)
		{
            if($i > 0){
                $receipt_no = $receipt_no + 1;
            }
            $this->db->select('tbl_city.*');    
            $this->db->from('tbl_city');
            $this->db->where('city_name',$row["City"]);
            $res = $this->db->get();
            $result = $res->result_array();
            foreach($result as $r){
                $city_id = $r['id'];
            }

            $this->db->select('tbl_hub.*');    
            $this->db->from('tbl_hub');
            $this->db->where('hub_name',$row["OriginHub"]);
            $res = $this->db->get();
            $result = $res->result_array();
            foreach($result as $r){
                $hub_id = $r['id'];
            }

            $this->db->select('tbl_vendor.*');    
            $this->db->from('tbl_vendor');
            $this->db->where('vendor_name',$row["VendorName"]);
            $res = $this->db->get();
           // $result = $res->result_array();
           if($res->num_rows() > 0){
                foreach($res->result() as $r){
                    $vendor_id = $r->id;
                }
            }else{
                $vendor = array(
                    'vendor_name' => $row["VendorName"],
                    'vendor_phone' => '',
                    'vendor_email' => '',
                    'user_id' => $this->session->userid,
                );
        
                $res = $this->Delivery_model->insertvendor($vendor, "tbl_vendor");
    
                $vendor_id = $res;
            }

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
                }
            }

			$data[] = array(
                            'vendor_id'   => $vendor_id,
                            'rec_name'   => $row["Receiver Name"],
                            'rec_phone'   => $row["Reciver Phone"],
                            'rec_address'   => $row["Reciever Address"],
                            'pack_desc'   => $row["Package Description"],
                            'pack_type'   => $row["PackageType"],
                            'logi_type'   => $row["Logistics Type"],
                            'pack_weight'   => $row["Package Weight"],
                            'dest_region'   => $row["DestinationRegion"],
                            'city'   => $city_id,
                            'hub'   => $hub_id,
                            'shipping_fee'   => $amt,
                            'collect_amt'   => $row["Amount to Collect"],
                            'user_id' => $this->session->userid,
                            'Created_at' => date("Y-m-d h:i:s"),
                            'receipt_no' => $receipt_no,
            
                        );
            $i++;
		}
        $this->Delivery_model->insert($data);
        // return $data;
	}
}