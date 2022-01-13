<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transitbag extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transit_model');
        $this->load->library('session');
    }

    public function save_data()
    {
        $tracking_no = $this->input->post('tracking_no');
        $tracking_no=explode(",",$tracking_no);
        $data = array(
            'destination_hub' => $this->input->post('hub_id'),
            'transit_bag' => $this->input->post('transit_bag'),
            'status' => 1,
            'updated_by' => $this->session->userid,
            'updated_at' => date("Y-m-d h:i:s"),
        );
        for($i=0;$i<count($tracking_no);$i++){
            $res = $this->Transit_model->updatedata($data, $tracking_no[$i], "tbl_delivery");
        }
         
        echo $res;
    }
    public function update_data()
    {
        $tracking_no = $this->input->post('tracking_no');
        $lost_tracking_no = $this->input->post('lost_tracking_no');
        $tracking_no=explode(",",$tracking_no);
        $lost_tracking_no=explode(",",$lost_tracking_no);
        $data = array(
            'received_by' => $this->session->userid,
            'status' => 2, // for receive package
            'received_at' => date("Y-m-d h:i:s"),
        );
        for($i=0;$i<count($tracking_no);$i++){
            $res = $this->Transit_model->updatedata($data, $tracking_no[$i], "tbl_delivery");
        }

        $data1 = array(
            'received_by' => $this->session->userid,
            'status' => 3, // for lost package
            'received_at' => date("Y-m-d h:i:s"),
        );
        for($i=0;$i<count($lost_tracking_no);$i++){
            $res = $this->Transit_model->updatedata($data1, $lost_tracking_no[$i], "tbl_delivery");
        }
         
        echo $res;
    }

    function get_data()
    {
        $table_name	=$this->input->post('table_name');
        $data = $this->Transit_model->get_data($table_name);
        echo json_encode($data);
    }

    function print_data()
    {
        $transit_bag = $this->input->post('transit_bag');
        $data['record'] = $this->Transit_model->print_data($transit_bag);
        $data['transit_bag'] = $transit_bag;
        $this->db->select('tbl_hub.hub_name,tbl_delivery.receipt_no');    
        $this->db->from('tbl_delivery');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.destination_hub');
        $this->db->where('tbl_delivery.transit_bag',$transit_bag);
        $res = $this->db->get();
        $result = $res->result_array();
        $data['package_count'] = count($result);
        $barcode_arr = array();
        foreach($result as $r){
            $destination_hub = $r['hub_name'];
            $barcode = $this->barcode($r['receipt_no'],1);
            array_push($barcode_arr, $barcode);
        }
        $data['destination_hub'] = $destination_hub;
        $data['barcode'] = $barcode_arr;
        $data['transitbag_barcode'] = $this->barcode($transit_bag,0);
        $this->load->view('transitbag_list',$data);
    }
    function print_list()
    {
        $transit_bag = $this->input->post('transit_bag1');
        $data['record'] = $this->Transit_model->print_list($transit_bag);
        $data['transit_bag'] = $transit_bag;
        $this->db->select('tbl_hub.hub_name');    
        $this->db->from('tbl_delivery');
        $this->db->join('tbl_hub','tbl_hub.id= tbl_delivery.destination_hub');
        $this->db->where('tbl_delivery.transit_bag',$transit_bag);
        $res = $this->db->get();
        $result = $res->result_array();
        foreach($result as $r){
            $destination_hub = $r['hub_name'];  
        }
        $data['destination_hub'] = $destination_hub;
       
        $this->load->view('transit_bag_list',$data);
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

    function get_transit_data()
    {
        $table_name	=$this->input->post('table_name');
        $hub_id	=$this->input->post('hub_id');
        $transit_bag	=$this->input->post('transit_bag');
        $data = $this->Transit_model->get_transit_data($table_name,  $hub_id, $transit_bag);
      echo json_encode($data);
    }
}
?>