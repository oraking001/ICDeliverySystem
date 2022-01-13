<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zone extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Zone_model');
    }

    public function save_data()
    {
        $data = array(
            'zone_name' => $this->input->post('zone_name'),
            'Weight' => $this->input->post('zone_weight'),
            'Amount' => $this->input->post('amount'),
        );

        $res = $this->Zone_model->insertdata($data, "tbl_zone");

        echo $res;
    }

    public function update_data()
    {
        $id = $this->input->post('save_update');
        $data = array(
            'zone_name' => $this->input->post('zone_name'),
            'Weight' => $this->input->post('zone_weight'),
            'Amount' => $this->input->post('amount'),
        );

        $res = $this->Zone_model->updatedata($data, $id, "tbl_zone");

        echo $res;
    }

    function get_data()
    {
        $table_name	=$this->input->post('table_name');
        $data = $this->Zone_model->get_data($table_name);
      echo json_encode($data);
    }
}