<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_febric'))
{
    function get_febric($var)
    {
    	$CI = get_instance();
    	$CI->load->model('DBfunction');
    	//$this->load->
    	$feb_where = array('id'=>$var);
    	$result = $CI->DBfunction->getArrayWhereResult('tbl_inventory',$feb_where);
        return $result;
    }   
}

if ( ! function_exists('getColor'))
{
    function get_color($var)
    {
    	$CI = get_instance();
    	$CI->load->model('DBfunction');
    	//$this->load->
    	$color_name = '';
    	$color_where = array('color_id'=>$var);
    	$result = $CI->DBfunction->getArrayWhereResult('tbl_color',$color_where);
    	foreach ($result as $key => $value) {
    		$color_name=$value->color_name;
    	}
        return $color_name;
    }   
}

if ( ! function_exists('get_role'))
{
    function get_role($var)
    {
        $CI = get_instance();
        $CI->load->model('DBfunction');
        //$this->load->
        $role_name = '';
        $role_where = array('role_id'=>$var);
        $result = $CI->DBfunction->getArrayWhereResult('user_role',$role_where);
        foreach ($result as $key => $value) {
            $role_name=$value->role_name;
        }
        return $role_name;
    }   
}

if ( ! function_exists('get_order_qty'))
{
    function get_order_qty($var)
    {
        $CI = get_instance();
        $CI->load->model('DBfunction');
        $table = 'tbl_order';
        $total_weight = '';
        //$date_toady = date("Y-m-d");
        //$job_where = array('entroy_date'=>$date_toady,'all_febric'=>$var);
        //$job_where = array('status' =>1);

       // $job_where = array('DATE(entroy_date)'=>$date_toady,'all_febric'=>$var);
       // $total_order_weight = $CI->DBfunction->get_order_sum($table,$job_where);       
        return $total_order_weight;
    }   
}

 if ( ! function_exists('get_order_details'))
{
    function get_order_details($var)
    {
        $CI = get_instance();
        $CI->load->model('DBfunction');
        $table = 'order_details';
        $array_order = array('o_id' =>$var);
        $result = $CI->DBfunction->getArrayWhereResult($table,$array_order);
        return $result;
    }   
}

// if ( ! function_exists('get_order_total'))
// {
//     function get_order_total($var)
//     {
//         $CI = get_instance();
//         $CI->load->model('DBfunction');
//         $table = 'order_details';
//         $array_order = array('o_id' =>$var);
//         $result = $CI->DBfunction->getArrayWhereResult($table,$array_order);
//         return $result;
//     }   
// }