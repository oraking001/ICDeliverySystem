<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driversheet extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Driver_model');
        $this->load->library('session');
    }

    public function update_data()
    {
        $tracking_no = $this->input->post('tracking_no');
        $tracking_no=explode(",",$tracking_no);
        $data = array(
            'driver_sheet' => $this->input->post('driver_sheet'),
            'deliver_by' => $this->session->userid,
            'driver_id' => $this->input->post('driver_id'),
            'status' => 4, // In Delivery
            'delivery_at' => date("Y-m-d h:i:s"),
        );
        for($i=0;$i<count($tracking_no);$i++){
            $res = $this->Driver_model->updatedata($data, $tracking_no[$i], "tbl_delivery");
        }

        echo $res;
    }

    function get_data()
    {
        $table_name	=$this->input->post('table_name');
        $hub_id	=$this->input->post('hub_id');
        $data = $this->Driver_model->get_data($table_name,$hub_id);
        echo json_encode($data);
    }

    function get_driversheet_data()
    {
        $table_name	=$this->input->post('table_name');
        $data = $this->Driver_model->get_driversheet_data($table_name);
        echo json_encode($data);
    }

    function print_data()
    {
        $driver_sheet = $this->input->post('driversheet');
        $data['record'] = $this->Driver_model->print_list($driver_sheet);
        $data['driver_sheet'] = $driver_sheet;
        $this->db->select('tbl_hub.hub_name,tbl_delivery.receipt_no,tbl_login.sau_FName as driver_name');    
        $this->db->from('tbl_delivery');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.destination_hub');
        $this->db->join('tbl_login','tbl_login.sa_id= tbl_delivery.driver_id');
        $this->db->where('tbl_delivery.driver_sheet',$driver_sheet);
        $res = $this->db->get();
        $result = $res->result_array();
        $data['package_count'] = count($result);
        $barcode_arr = array();
        foreach($result as $r){
            $destination_hub = $r['hub_name'];
            $driver_name = $r['driver_name'];
            $barcode = $this->barcode($r['receipt_no'],1);
            array_push($barcode_arr, $barcode);
        }
        $data['destination_hub'] = $destination_hub;
        $data['driver_name'] = $driver_name;
        $data['barcode'] = $barcode_arr;
     //   $data['transitbag_barcode'] = $this->barcode($transit_bag,0);
        $this->load->view('driversheet_list',$data);
    }

    //Barcode generation function, using Zend library
    function barcode($receipt_no,$flag)
    {
        $this->load->library('Zend');
        $this->zend->load('Zend/Barcode');
       
        // $this->db->select('tbl_delivery.receipt_no');    
        // $this->db->from('tbl_delivery');
        // $this->db->where('id',$id);
        // $res = $this->db->get();
        // $result = $res->result_array();
        // foreach($result as $r){
        //     $receipt_no = $r['receipt_no'];
        // }

      //  $barcodeOptions = array('text' => 'ICL'.$res->receipt_no);
        $rendererOptions = array('imageType'          =>'png', 
                                        'horizontalPosition' => 'center', 
                                        'verticalPosition'   => 'middle');
            
      // $imageResource=Zend_Barcode::factory('code128', 'image', $barcodeOptions, $rendererOptions)->render();
        if (file_exists('uploads/'.$receipt_no.'.png')) 
        {
            unlink('uploads/'.$receipt_no.'.png');
        }
        if($flag == 1){
            $text = 'ICL'.$receipt_no;
        }else{
            $text = $receipt_no;
        }
       $imageResource = Zend_Barcode::factory('code128', 'image', array('text'=> $text), array())->draw();
       imagepng($imageResource, 'uploads/'.$receipt_no.'.png');
     //  return $imageResource;

        return $receipt_no.'.png';
        
    }

    function get_driver_delivery()
    {
        $table_name	=$this->input->post('table_name');
        $vendor_id	= $this->input->post('vandor_id');
        $data = $this->Driver_model->get_driver_delivery($table_name,$vendor_id);
        echo json_encode($data);
    }

    public function update_driver_delivery()
    {
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        if($type == 1){
            $data = array(
                'status' => 5, // Driver Deliverd
                'driver_delivery_at' => date("Y-m-d h:i:s"),
            );
        }else{
            $data = array(
                'status' => 6, // Driver Deliverd Failed
                'driver_delivery_at' => date("Y-m-d h:i:s"),
                'failed_reason' => $this->input->post('reason'),
            );
        }
        
        
        $res = $this->Driver_model->updatedata($data, $id, "tbl_delivery");
       
        echo $res;
    }
}
?>