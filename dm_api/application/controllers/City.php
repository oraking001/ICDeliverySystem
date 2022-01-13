<?php
defined('BASEPATH') or exit('No direct script access allowed');

class City extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('City_model');
    }

    public function save_data()
    {
        $data = array(
            'city_name' => $this->input->post('city_name'),
            'region' => $this->input->post('region'),
            'tier_id' => $this->input->post('tier'),
            'zone_id' => $this->input->post('zone'),
        );

        $res = $this->City_model->insertdata($data, "tbl_city");

        echo $res;
    }

    public function update_data()
    {
        $id = $this->input->post('save_update');
        $data = array(
            'city_name' => $this->input->post('city_name'),
            'region' => $this->input->post('region'),
            'tier_id' => $this->input->post('tier'),
            'zone_id' => $this->input->post('zone'),
        );

        $res = $this->City_model->updatedata($data, $id, "tbl_city");

        echo $res;
    }

    function get_data()
    {
        $table_name	=$this->input->post('table_name');
        $data = $this->City_model->get_data($table_name);
      echo json_encode($data);
    }

    function get_dropdown()
    {
        $table_name	=$this->input->post('table_name');
        $data = $this->City_model->get_dropdown($table_name);
      echo json_encode($data);
    }
}