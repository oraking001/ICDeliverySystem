<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class User_model extends CI_Model {
	public function __construct() {
		parent::__construct ();
	}
	public function create_user($username, $email, $password, $branch) {
		
		$futureDate = date('Y-m-d', strtotime('+1 year'));
		$data = array (
				'userName' => $username,
				'email' => $email,
				'password' => $this->hash_password( $password ),
				'authority' => 'Yes',
				'role' => 'Admin',
				'branch' => $branch,
				'ex_date' => $futureDate,
		);
		// print_r($data);die;
		return $this->db->insert ( 'login', $data );
	}
	public function resolve_user_login($username, $password) {
		$this->db->select ( 'sau_pwd' );
		$this->db->from ( 'tbl_login' );
		$this->db->where ( 'sau_name', $username );
		$this->db->where('is_active',1);
		$hash = $this->db->get ()->row ( 'sau_pwd' );
		return $this->verify_password_hash( $password, $hash );

	}
	public function get_user_id_from_username($username) {
		$this->db->select ( 'sa_id' );
		$this->db->from ( 'tbl_login' );
		$this->db->where ( 'sau_name', $username );
		return $this->db->get ()->row ( 'sa_id' );
	}
	public function get_user($user_id) {
		$this->db->from ( 'tbl_login' );
		$this->db->where ( 'sa_id', $user_id );
		return $this->db->get ()->result();
	}
	private function hash_password($password) {
		return password_hash ( $password, PASSWORD_BCRYPT );
	}
	private function verify_password_hash($password, $hash) {
		return password_verify ( $password, $hash );
		// if(password_verify ( $password, $hash )){
		// 	return 1;
		// }else{
		// 	return 0;
		// }
	}

	function insertdata($data, $table)
    {
        if($this->db->insert($table, $data))
        {
            return 1;
        }else{
            return 0;
        }
	}
	
	public function getArrayWhereResultnew($table, $where) {
		$query = $this->db->get_where ( $table, $where );
		$allData = $query->row_array();
		return $allData;
	}
}