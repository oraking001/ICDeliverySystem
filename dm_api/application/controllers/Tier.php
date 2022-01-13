<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tier_model');
    }

    public function save_data()
    {
        $data = array(
            'Tier_Name' => $this->input->post('tier_name'),
            'Weight' => $this->input->post('tier_weight'),
            'Amount' => $this->input->post('amount'),
        );

        $res = $this->Tier_model->insertdata($data, "tbl_tier");

        echo $res;
    }

    public function update_data()
    {
        $id = $this->input->post('save_update');
        $data = array(
            'Tier_Name' => $this->input->post('tier_name'),
            'Weight' => $this->input->post('tier_weight'),
            'Amount' => $this->input->post('amount'),
        );

        $res = $this->Tier_model->updatedata($data, $id, "tbl_tier");

        echo $res;
    }

    function get_data()
    {
        $table_name	=$this->input->post('table_name');
        $data = $this->Tier_model->get_data($table_name);
      echo json_encode($data);
    }
}