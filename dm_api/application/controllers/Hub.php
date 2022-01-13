<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hub extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Hub_model');
    }

    public function save_data()
    {
        $data = array(
            'hub_name' => $this->input->post('hub_name'),
        );

        $res = $this->Hub_model->insertdata($data, "tbl_hub");

        echo $res;
    }

    public function update_data()
    {
        $id = $this->input->post('save_update');
        $data = array(
            'hub_name' => $this->input->post('hub_name'),
        );

        $res = $this->Hub_model->updatedata($data, $id, "tbl_hub");

        echo $res;
    }

    function get_data()
    {
        $table_name	=$this->input->post('table_name');
        $data = $this->Hub_model->get_data($table_name);
      echo json_encode($data);
    }
}