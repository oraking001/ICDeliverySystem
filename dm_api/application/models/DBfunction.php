<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class DBfunction extends CI_Model {
	function __construct() {
		parent::__construct ();
		$this->load->library('session');
	}
	public function insertAll($table, $data) {
		$this->db->insert ( $table, $data );
		$insert_id = $this->db->insert_id ();
		if ($insert_id > 0) {
			return $insert_id;
		} else {
			return false;
		}
	}
	public function getAllResult($table) {
		$query = $this->db->get ( $table );
		$allData = $query->result ();
		return $allData;
	}

	public function getAllResultnew($table) {
		$query = $this->db->get ( $table );
		$allData = $query->row_array();
		return $allData;
	}
	public function getAllResultDESC($table) {
		$this->db->order_by ( "id", "desc" );
		$query = $this->db->get ( $table );
		$allData = $query->result ();
		return $allData;
	}
	public function getAllResultDESCById($table) {
		$this->db->order_by ( "id", "desc" );
		$query = $this->db->get ( $table );
		$allData = $query->result ();
		return $allData;
	}
	public function getAllResultDESCBytype($table, $type) {
		$this->db->order_by ( "id", "desc" );
		$this->db->where ( 'tax_type', $type );
		$query = $this->db->get ( $table );
		$allData = $query->result ();
		return $allData;
	}
	public function getOneWhereResultForId($table, $id) {
		$this->db->select ( '*' );
		$this->db->where ( 'id', $id );
		$query = $this->db->get ( $table );
		$allData = $query->result ();
		return $allData;
	}
	public function getArrayWhereResultDESC($table, $where) {
		$this->db->order_by ( "id", "desc" );
		$query = $this->db->get_where ( $table, $where );
		$allData = $query->result ();
		return $allData;
	}
	public function getArrayWhereResult($table, $where) {
		$query = $this->db->get_where ( $table, $where );
		$allData = $query->result();
		return $allData;
	}
	public function getArrayWhereResultnew($table, $where) {
		$query = $this->db->get_where ( $table, $where );
		$allData = $query->row_array();
		return $allData;
	}
	public function getOneWhereRowForId($table, $id) {
		$this->db->select ( '*' );
		$this->db->where ( 'id', $id );
		$query = $this->db->get ( $table );
		$allData = $query->result ();
		return $allData;
	}
	public function getOneWhereResultForIdDESC($table, $id) {
		$this->db->select ( '*' );
		$this->db->where ( 'id', $id );
		$this->db->order_by ( "id", "desc" );
		$query = $this->db->get ( $table );
		$allData = $query->result ();
		return $allData;
	}
	public function getOneWhereRowForIdDESC($table, $id) {
		$this->db->select ( '*' );
		$this->db->where ( 'id', $id );
		$this->db->order_by ( "id", "desc" );
		$query = $this->db->get ( $table );
		$allData = $query->row ();
		return $allData;
	}
	public function getOneWhereResultForColumGroup_by($table, $where, $data) {
		if (!empty($where)) {
			$this->db->where ('attribute_type', $where );
			$this->db->group_by ( $data );
			$query = $this->db->get ( $table );
			$allData = $query->result ();
		} else {
			$this->db->group_by ( $data );
			$query = $this->db->get ( $table );
			$allData = $query->result ();
		}
		return $allData;
	}
	public function getOneWhereResultForColum($table,  $data) {
		$this->db->select ( '*' );
		$this->db->where ( $data );
		$query = $this->db->get ( $table );
		$allData = $query->result ();
		return $allData;
	}
	public function updateWhereId($table, $where, $data) {
		$this->db->where ( 'id', $where );
		$this->db->update ( $table, $data );
		$afftectedRows = $this->db->affected_rows ();
		return $afftectedRows;
	}
	public function updateArrayWhereResult($table, $data, $where) {
		$this->db->where ( $where );
		$this->db->update ( $table, $data );
		$afftectedRows = $this->db->affected_rows ();
		return $afftectedRows;
	}
	public function update($table, $data) {
		$this->db->update ( $table, $data );
		$afftectedRows = $this->db->affected_rows ();
		return $afftectedRows;
	}
	public function deleteWhereId($table, $id, $data) {
		$this->db->where ( $id, $data );
		$this->db->delete ( $table );
		return true;
	}
	public function delete_where_id($table,$id){
		$this->db->where('user_id', $id);
		$this->db->delete($table);
		return true;
	}

	public function deleteId($table, $id) {
		$this->db->where ( 'id', $id );
		$this->db->delete ( $table );
		return true;
	}
	public function getArrayWhereResultCondition($table, $where, $Condition) {
		if (! empty ( $where )) {
			$allData = $this->db->where ( $where )->group_by ( 'attribute_id' )->get ( $table )->result ();
		} else {
			$allData = $this->db->group_by ( 'attribute_id' )->get ( $table )->result ();
		}
		return $allData;
	}
	public function getArrayWhereResultGroupBY($table, $where, $Condition) {
		if (! empty ( $where )) {
			$allData = $this->db->where ( $where )->group_by ( $Condition )->get ( $table )->result ();
		} else {
			$allData = $this->db->group_by ( $Condition )->get ( $table )->result ();
		}
		return $allData;
	}
	public function getMaxNumber($table, $data) {
		$this->db->select_max ( $data );
		return $allData = $this->db->get ( $table )->result ();
		$this->db->last_query ();
		;
	}
	public function getAllResultGroupBy($table, $data) {
		$this->db->get ( $table );
		$this->db->group_by ( $data );
		return true;
	}
	public function totalCount($table, $where) {
		$this->db->select ( '*' );
		$this->db->where ( $where );
		return $this->db->count_all_results ( $table );
		$this->db->last_query ();
	}
	public function totalAllCount($table) {
		$this->db->select ( '*' );
		return $this->db->count_all_results ( $table );
		$this->db->last_query ();
	}
	public function totalSum($sum, $table, $where) {
		$this->db->select_sum ( $sum );
		$query = $this->db->get_where ( $table, $where );
		return $allData = $query->result ();
		  $this->db->last_query ();
	}
	public function delete_editdata($table, $invoiceno) {
		$this->db->where ( 'invoice_no', $invoiceno );
		$this->db->delete ( $table );
	}
	public function delete_array($table, $data) {
		$this->db->where ( $data );
		$data = $this->db->delete ( $table );
		if ($data) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/* changes for user_id */
	public function hub_performance_list($user_id = null) {
		$this->db
			->select('hub.hub_name, hub_pr.*')
			->from('hub_performance as hub_pr')
			->join('tbl_hub as hub', 'hub_pr.hub_id_f = hub.id', 'left');
			
		if ($user_id !== null) {
			$this->db->join('hub_previlage as hub_pl', 'hub_pl.hub_id = hub.id', 'left');
			$this->db->where('hub_pl.user_id', $user_id);
		}
		$query = $this->db->get();

		return $query->result_array();
	}
	
	public function gethub_were_user_agreement($table, $where){
		$hub_previlage = 'hub_previlage';
		$tbl_agreement_acceptence = 'tbl_agreement_acceptence';
		$this->db->select($table.'.*, tbl_agreement_acceptence.hub_id as accept,tbl_agreement_acceptence.hub_id as agree_hub_id, tbl_agreement_acceptence.user_id as agree_user_id,hub_previlage.user_id as u_id,tbl_agreement_acceptence.acceptecnce_time as timeacpt');
		$this->db->from($hub_previlage);
		$this->db->join($table, $hub_previlage.'.hub_id='.$table.'.id', 'left'); 
		$this->db->join($tbl_agreement_acceptence, 'tbl_agreement_acceptence.hub_id='.$hub_previlage.'.hub_id', 'left outer'); 
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result(); 
	}
	
// 	public function gethub_were_user_agreement($table, $where){
// 		$hub_previlage = 'hub_previlage';
// 		$tbl_agreement_acceptence = 'tbl_agreement_acceptence';
// 		$this->db->select($table.'.*, tbl_agreement_acceptence.hub_id as accept,tbl_agreement_acceptence.hub_id as agree_hub_id, tbl_agreement_acceptence.user_id as agree_user_id,hub_previlage.user_id as u_id');
// 		$this->db->from($hub_previlage);
// 		$this->db->join($table, $hub_previlage.'.hub_id='.$table.'.id', 'left'); 
// 		$this->db->join($tbl_agreement_acceptence, 'tbl_agreement_acceptence.hub_id='.$hub_previlage.'.hub_id', 'left'); 
		
// 		$this->db->where($where);
// 		$query = $this->db->get();
// 		return $query->result(); 
// 	}

/*	public function hub_performance_list_hub_id($hub_id, $from_date=null, $to_date=null, $user_id = null) {
		$this->db
			->select('hub.hub_name, hub_pr.*')
			->from('hub_performance as hub_pr')
			->join('tbl_hub as hub', 'hub_pr.hub_id_f = hub.id', 'left');
			
		if ($user_id !== null) {
			$this->db->join('hub_previlage as hub_pl', 'hub_pl.hub_id = hub.id', 'left');
			$this->db->where('hub_pl.user_id', $user_id);
		}
		$this->db->where('hub_pr.hub_id_f', $hub_id);
	    if($from_date!=null && $to_date!=null){
		$this->db->where('hub_pr.date >=', $from_date);
		$this->db->where('hub_pr.date <=', $to_date);}
		
		$query = $this->db->get();

		return $query->result_array();
	}*/
	
	public function hub_performance_list_hub_id($hub_id, $from_date=null, $to_date=null, $user_id = null) {
		$this->db
			->select('hub.hub_name, hub_pr.*')
			->from('hub_performance as hub_pr')
			->join('tbl_hub as hub', 'hub_pr.hub_id_f = hub.id', 'left');
			
		if($user_id != null) {
			$this->db->join('hub_previlage as hub_pl', 'hub_pl.hub_id = hub.id', 'left');
			$this->db->where('hub_pl.user_id', $user_id);
		}
		$this->db->where('hub_pr.hub_id_f', $hub_id);

		// echo $from_date."<br>".$to_date;

		if($from_date != null && $to_date != null){
		$this->db->where('hub_pr.date >=', $from_date);
		$this->db->where('hub_pr.date <=', $to_date);
		$query = $this->db->get();
		}else
		{
			$query = $this->db->get();
		}

		return $query->result_array();
	}


	
	/* changes for user_id */
	public function packages_list($hub_id, $from_date=null, $to_date=null, $user_id = null) {
		$this->db
			->select('(@srno := @srno + 1) as srno,pack.tracking_number, hub.hub_id as hubmain_id, pack.service_provider, hub.hub_name, pack.delivered_date_time, pack.received_time_date, pack.status, pack.delivery_classification, pack.rate')
			->from('(select @srno := 0) as srno, tbl_packages as pack')
			->join('tbl_hub as hub', 'pack.hub_id = hub.id', 'left');
		
		if ($user_id !== null) {
			$this->db->join('hub_previlage as hub_pl', 'hub_pl.hub_id = hub.id', 'left');
			$this->db->where('hub_pl.user_id', $user_id);
		}
		$this->db->where('hub.id', $hub_id);
		if($from_date!==null && $to_date!==null){
		$this->db->where('pack.delivered_date_time >=', $from_date);
		$this->db->where('pack.delivered_date_time <=', $to_date);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function packages_all_list($hub_id, $user_id = null) {
		$this->db
			->select('hub.hub_name,hub.hub_id as hubmain_id,pack.*')
			->from('tbl_packages as pack')
			->join('tbl_hub as hub', 'pack.hub_id = hub.id', 'left');
		if ($user_id !== null) {
			$this->db->join('hub_previlage as hub_pl', 'hub_pl.hub_id = hub.id', 'left');
			$this->db->where('hub_pl.user_id', $user_id);
		}
		$this->db->where('hub.id', $hub_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	

	/* changes for user_id */
	public function deduction_list($hub_where, $from_date, $to_date, $user_id = null) {
		$this->db
			->select('hub.hub_name,hub.hub_id, ded.*')
			->from('tbl_hub as hub')
			->join('deductions as ded', 'ded.hub_id_f = hub.id', 'inner');		
		if ($user_id !== null) {
			$this->db->join('hub_previlage as hub_pl', 'hub_pl.hub_id = hub.id', 'left');
			$this->db->where('hub_pl.user_id', $user_id);
		}
		$this->db->where($hub_where);
		$this->db->where('ded.date>=', $from_date);
		$this->db->where('ded.date<=', $to_date);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function account_statement_list($hub_id = null,$from_date,$to_date) {
		$this->db
			->select('hub.hub_name, hub.vat, hub.created_date, pack.delivery_classification')
			->select('count(pack.hub_id) as totalhub')
			->select_avg('pack.rate', 'rate')
			//->select_sum('pack.amount', 'totalamount')
			->from('tbl_packages as pack')
			->join('tbl_hub as hub', 'hub.id = pack.hub_id', 'left')
			->group_by('hub.hub_name, hub.vat, hub.created_date, pack.delivery_classification')
			->where('hub.id', $hub_id)
			->where('pack.delivered_date_time >=', $from_date)
			->where('pack.delivered_date_time <=', $to_date);
		$query = $this->db->get();
		return $query->result_array();
	}

// 	public function get_hub_score($hub_id, $from_date, $to_date, $user_id=null){
// 		$this->db->select_avg('hub_score');
// 		$this->db->from('hub_performance');
// 		$this->db->where('hub_performance.date >=', $from_date);
// 		$this->db->where('hub_performance.date <=', $to_date);	
// 		$this->db->where('hub_performance.hub_id_f',$hub_id);
// 		$query = $this->db->get();	
// 		$query = $query->row()->hub_score;

// 		return $query;
// 	}

// 	public function get_hub_position($hub_id, $from_date, $to_date, $user_id=null){
// 		$this->db->select_avg('hub_position');
// 		$this->db->from('hub_performance');
// 		$this->db->where('hub_performance.date >=', $from_date);
// 		$this->db->where('hub_performance.date <=', $to_date);	
// 		$this->db->where('hub_performance.hub_id_f',$hub_id);
// 		$query = $this->db->get();	
// 		$query = $query->row()->hub_position;
// 		return $query;
// 	}

// 	public function get_hub_fda_sr($hub_id, $from_date, $to_date, $user_id=null){
// 		$this->db->select_avg('fda_sr');
// 		$this->db->from('hub_performance');
// 		$this->db->where('hub_performance.date >=', $from_date);
// 		$this->db->where('hub_performance.date <=', $to_date);	
// 		$this->db->where('hub_performance.hub_id_f',$hub_id);
// 		$query = $this->db->get();	
// 		$query = $query->row()->fda_sr;
// 		return $query;
// 	}

// 	public function get_hub_success_rate($hub_id, $from_date, $to_date, $user_id=null){
// 		$this->db->select_avg('success_rate');
// 		$this->db->from('hub_performance');
// 		$this->db->where('hub_performance.date >=', $from_date);
// 		$this->db->where('hub_performance.date <=', $to_date);	
// 		$this->db->where('hub_performance.hub_id_f',$hub_id);
// 		$query = $this->db->get();	
// 		$query = $query->row()->success_rate;
// 		return $query;
// 	}

// 	public function get_hub_ranitance($hub_id, $from_date, $to_date, $get_sum, $user_id=null){
// 		$this->db->select_sum($get_sum);
// 		$this->db->from('hub_performance');
// 		$this->db->where('hub_performance.date >=', $from_date);
// 		$this->db->where('hub_performance.date <=', $to_date);	
// 		$this->db->where('hub_performance.hub_id_f',$hub_id);
// 		$query = $this->db->get();	
// 		$query = $query->row()->$get_sum;
// 		return $query;
// 	}

	public function get_hub_score($hub_id, $from_date=null, $to_date=null, $user_id=null){
		$this->db->select_avg('hub_score');
		$this->db->from('hub_performance');
		if($from_date!=null && $to_date!=null){
		$this->db->where('hub_performance.date >=', $from_date);
		$this->db->where('hub_performance.date <=', $to_date);	
		}
		$this->db->where('hub_performance.hub_id_f',$hub_id);
		$query = $this->db->get();	
		$query = $query->row()->hub_score;

		return $query;
	}

	public function get_hub_position($hub_id, $from_date=null, $to_date=null, $user_id=null){
		$this->db->select_avg('hub_position');
		$this->db->from('hub_performance');
		if($from_date!=null && $to_date!=null){
		$this->db->where('hub_performance.date >=', $from_date);
		$this->db->where('hub_performance.date <=', $to_date);	
	}
		$this->db->where('hub_performance.hub_id_f',$hub_id);
		$query = $this->db->get();	
		$query = $query->row()->hub_position;
		return $query;
	}

	public function get_hub_fda_sr($hub_id, $from_date=null, $to_date=null, $user_id=null){
		$this->db->select_avg('fda_sr');
		$this->db->from('hub_performance');
		if($from_date!=null && $to_date!=null){
		$this->db->where('hub_performance.date >=', $from_date);
		$this->db->where('hub_performance.date <=', $to_date);
		}	
		$this->db->where('hub_performance.hub_id_f',$hub_id);
		$query = $this->db->get();	
		$query = $query->row()->fda_sr;
		return $query;
	}

	public function get_hub_success_rate($hub_id, $from_date=null, $to_date=null, $user_id=null){
		$this->db->select_avg('success_rate');
		$this->db->from('hub_performance');
		if($from_date!=null && $to_date!=null){
			$this->db->where('hub_performance.date >=', $from_date);
			$this->db->where('hub_performance.date <=', $to_date);	
		}
		$this->db->where('hub_performance.hub_id_f',$hub_id);
		$query = $this->db->get();	
		$query = $query->row()->success_rate;
		return $query;
	}

	public function get_hub_e2e_rate($hub_id, $from_date=null, $to_date=null, $user_id=null){
		$this->db->select_avg('e2e');
		$this->db->from('hub_performance');
		if($from_date!=null && $to_date!=null){
			$this->db->where('hub_performance.date >=', $from_date);
			$this->db->where('hub_performance.date <=', $to_date);	
		}
		$this->db->where('hub_performance.hub_id_f',$hub_id);
		$query = $this->db->get();	
		$query = $query->row()->e2e;
		return $query;
	}

	public function get_hub_mom_rate($hub_id, $from_date=null, $to_date=null, $user_id=null){
		$this->db->select_avg('metric_of_month');
		$this->db->from('hub_performance');
		if($from_date!=null && $to_date!=null){
			$this->db->where('hub_performance.date >=', $from_date);
			$this->db->where('hub_performance.date <=', $to_date);	
		}
		$this->db->where('hub_performance.hub_id_f',$hub_id);
		$query = $this->db->get();	
		$query = $query->row()->metric_of_month;
		return $query;
	}

	public function get_hub_ranitance($hub_id, $get_sum, $from_date=null, $to_date=null,  $user_id=null){
		$this->db->select_sum($get_sum);
		$this->db->from('hub_performance');
		if($from_date!=null && $to_date!=null){
		$this->db->where('hub_performance.date >=', $from_date);
		$this->db->where('hub_performance.date <=', $to_date);	
	}
		$this->db->where('hub_performance.hub_id_f',$hub_id);
		$query = $this->db->get();	
		$query = $query->row()->$get_sum;
		return $query;
	}
	public function get_last_6_month_r_data($hub_id=null){
// 		SELECT month(delivered_date_time), sum(amount) as last_6 FROM tbl_packages 
// WHERE `delivered_date_time` < Now() and `delivered_date_time` > DATE_ADD(Now(), INTERVAL- 6 MONTH)
// GROUP by month(delivered_date_time)

		// SELECT month(delivered_date_time), SUM(`amount`) AS `last_6` FROM `tbl_packages` WHERE `delivered_date_time` < Now() and `delivered_date_time` > DATE_ADD(Now(), INTERVAL- 6 MONTH GROUP BY month(delivered_date_time)
		$this->db->select('MONTHNAME(delivered_date_time) as label')
		->select_sum('rate', 'y')
		->from('tbl_packages')
		->where('delivered_date_time < Now() and delivered_date_time > DATE_ADD(Now(), INTERVAL- 6 MONTH)')
		->group_by('month(delivered_date_time)');
		if($hub_id != null){
			$this->db->where('hub_id',$hub_id);
		}
		//echo $this->db->get_compiled_select();
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_last_6_month_r_data_user($user_id, $hub_id=null){
		$this->db->select('MONTHNAME(delivered_date_time) as label')
		->select_sum('amount', 'y')
		->from('tbl_packages')
		->join('hub_previlage', 'hub_previlage.hub_id = tbl_packages.hub_id', 'left')
		->join('tbl_login', 'hub_previlage.user_id = tbl_login.sa_id', 'left')
		->where('delivered_date_time < Now() and delivered_date_time > DATE_ADD(Now(), INTERVAL- 6 MONTH)')
		->where('hub_previlage.user_id',$user_id)
		->group_by('month(delivered_date_time)');
		//echo $this->db->get_compiled_select();
		$query = $this->db->get();
		return $query->result_array();

		// $this->db->join('hub_previlage', 'hub_previlage.hub_id = tbl_hub.id', 'left');
  //   $this->db->join('tbl_login', 'hub_previlage.user_id = tbl_login.sa_id', 'left');
	}

	public function get_user_details($table,$where){
		$this->db
		->select('sau_FName,sau_PhoneNo,user_address,company_name,company_tin,account_number,account_name,bank,sau_LName')
		->from($table)
		->where($where);
		$query = $this->db->get();
		return $query->result_array();
	}

	

	// public function account_statement_list($hub_id = null) {
	// 	$this->db
	// 		->select('hub.hub_name, hub.vat, hub.created_date, pack.delivery_classification, ded.deduction_reason')
	// 		->select('count(pack.hub_id) as totalhub')
	// 		->select_avg('pack.rate', 'rate')
	// 		->select_sum('pack.amount', 'totalamount')
	// 		->select_sum('ded.amount', 'total_deductamount')
	// 		->from('tbl_packages as pack')
	// 		->join('tbl_hub as hub', 'hub.id = pack.hub_id', 'left')
	// 		->join('deductions as ded', 'ded.hub_id_f = hub.id', 'left')
	// 		->group_by('hub.hub_name, hub.vat, hub.created_date, pack.delivery_classification, ded.deduction_reason')
	// 		->where('hub.id', $hub_id);

	// 		// if ($hub_id !== null) {
	// 		// 	$this->db->join('hub_previlage as hub_pl', 'hub_pl.hub_id = hub.id', 'left');
	// 		// 	$this->db->where('hub_pl.user_id', $user_id);
	// 		// }
	// 	// if ($user_id !== null) {
	// 	// 	$this->db->join('hub_previlage as hub_pl', 'hub_pl.hub_id = hub.id', 'left');
	// 	// 	$this->db->where('hub_pl.user_id', $user_id);
	// 	// }
	// 	$query = $this->db->get();

	// 	return $query->result_array();
	// }

	public function account_statement_list_date($from_date=null,$to_date=null) {

		// $query_package = $this->db
	 //        ->select('package.rate, hub.hub_name, package.hub_id as id, package.delivered_date_time, hub.created_date, hub.hub_id, hub.vat')
	 //        ->from('tbl_packages as package')
	 //        ->join('tbl_hub as hub', 'hub.id = package.hub_id', 'left')
	 //        ->get_compiled_select();
	   
	 //   $this->db->reset_query();
	   
	 //   $query_previlage = $this->db
	 //        ->select('count(*) as login_count', FALSE)
	 //        ->select_max('user_id', 'user_id')
	 //        ->select('hub_id')
	 //        ->from('hub_previlage as previlage')
	 //        ->group_by('previlage.hub_id')
	 //        ->get_compiled_select();
    
  //       $this->db->reset_query();

  //       if($from_date != null && $to_date != null) {
  //   	    $this->db->where('delivered_date_time >=', $from_date);
		//     $this->db->where('delivered_date_time <=', $to_date);
  //       }
		
  //       return $this->db
  //           ->select_sum('a.rate', 'totalamount')
  //           ->select_max('a.hub_name', 'hub_name')
  //           ->select_max('a.created_date', 'created_date')
  //           ->select_max('a.hub_id', 'hub_id')
  //           ->select_max('a.vat', 'vat')
  //           ->select_max('b.user_id', 'sa_id')
  //           ->select_max('login.sau_FName', 'sau_FName')
  //           ->select_max('b.login_count', 'login_count')
  //           ->select('a.id')
  //           ->from("($query_package) as a")
  //           ->join("($query_previlage) as b", "b.hub_id = a.id","left")
  //           ->join('tbl_login as login', 'login.sa_id = b.user_id', 'left')
  //           ->group_by('a.id')
  //           ->get()->result_array();

		$tbl_hub = 'tbl_hub';
		$tbl_packages = 'tbl_packages';		
		$this->db->select($tbl_hub.'.id,'.$tbl_hub.'.hub_name,'.$tbl_hub.'.vat,'.$tbl_hub.'.hub_id,'.$tbl_hub.'.created_date, login.sau_FName, login.sa_id, count(`hub_pl`.`user_id`) as `count1`' );
		$this->db->select_sum($tbl_packages.'.rate', 'totalamount');

		$this->db->from($tbl_hub);		
    	$this->db->join($tbl_packages, $tbl_hub.'.id ='.$tbl_packages.'.hub_id', 'left');
    	$this->db->join('hub_previlage as hub_pl', 'hub_pl.hub_id = tbl_hub.id', 'left');

    	$this->db->join('tbl_login as login', 'login.sa_id = hub_pl.user_id', 'left');
    	//$this->db->limit('hub_pl',1);
    	$this->db->where('login.user_type',1);
    	//$this->db->where($tbl_packages.'.status','delivered');
    	$this->db->group_by($tbl_hub.'.hub_id');
    	//$this->db->group_by('login.sa_id');
	
// 		$this->db->query('SELECT `tbl_hub`.`id`, `tbl_hub`.`hub_name`, `tbl_hub`.`vat`, `tbl_hub`.`hub_id`, `tbl_hub`.`created_date`, SUM(`tbl_packages`.`rate`) AS `totalamount`, `tbl_login`.`sau_FName`,`tbl_login`.`sa_id`
// FROM `tbl_hub`
// LEFT JOIN `tbl_packages` ON `tbl_hub`.`id` =`tbl_packages`.`hub_id`
// LEFT JOIN `tbl_login` ON `tbl_login`.`sa_id` = (SELECT user_id FROM hub_previlage where hub_id =`tbl_hub`.`id` limit 1 ) ')
// 		->from('tbl_hub')
// 		->join('`tbl_packages`, `tbl_hub`.`id` =`tbl_packages`.`hub_id`')
// 		->join('`tbl_login`, `tbl_login`.`sa_id` = (SELECT user_id FROM hub_previlage where hub_id =`tbl_hub`.`id` limit 1 )');
		
		if($from_date!=null && $to_date!=null){
    	$this->db->where($tbl_packages.'.delivered_date_time >=', $from_date);
		$this->db->where($tbl_packages.'.delivered_date_time <=', $to_date);
		}

		


// WHERE 
//  `tbl_packages`.`delivered_date_time` >= '2018-09-01'
// AND `tbl_packages`.`delivered_date_time` <= '2018-09-30'
// GROUP BY `tbl_hub`.`hub_id`		
// 		SELECT `tbl_hub`.`id`, `tbl_hub`.`hub_name`, `tbl_hub`.`vat`, `tbl_hub`.`hub_id`, `tbl_hub`.`created_date`, SUM(`tbl_packages`.`rate`) AS `totalamount`, tbl_login.*
// FROM `tbl_hub`
// LEFT JOIN `tbl_packages` ON `tbl_hub`.`id` =`tbl_packages`.`hub_id`
// LEFT JOIN `tbl_login` ON `tbl_login`.`sa_id` = (SELECT user_id FROM hub_previlage where hub_id =`tbl_hub`.`id` limit 1 ) 

// WHERE 
//  `tbl_packages`.`delivered_date_time` >= '2019-01-01'
// AND `tbl_packages`.`delivered_date_time` <= '2019-01-31'
// GROUP BY `tbl_hub`.`hub_id`
// 		$sql_query('SELECT `tbl_hub`.`id`, `tbl_hub`.`hub_name`, `tbl_hub`.`vat`, `tbl_hub`.`hub_id`, `tbl_hub`.`created_date`, SUM(`tbl_packages`.`rate`) AS `totalamount`, tbl_login.*
// FROM `tbl_hub`
// LEFT JOIN `tbl_packages` ON `tbl_hub`.`id` =`tbl_packages`.`hub_id`
// LEFT JOIN `tbl_login` ON `tbl_login`.`sa_id` = (SELECT user_id FROM hub_previlage where hub_id =`tbl_hub`.`id` limit 1 )
// ');	
	//	$this->query($sql_query);

	// 	$this->db->select('`tbl_hub`.`id`, `tbl_hub`.`hub_name`, `tbl_hub`.`vat`, `tbl_hub`.`hub_id`, `tbl_hub`.`created_date`, SUM(`tbl_packages`.`rate`) AS `totalamount`, tbl_login.*')
	// 		->from(`tbl_hub`)
	// 		->join('tbl_packages', 'tbl_hub.id = tbl_packages.hub_id', 'left');
	// // $query0 = $this->db-> select('user_id')
	// // 			->from('hub_previlage')
	// // 			->where('hub_id =tbl_hub.id')
	// // 			->limit('hub_previlage',1)
	// 			->get();
	// 	$this->db->join('tbl_login', 'tbl_login.sa_id = "select user_id from hub_previlage where hub_id = tbl_hub.id limit 1 " ', 'left');
	// 	if($from_date!=null && $to_date!=null){
 //    		$this->db->where($tbl_packages.'.delivered_date_time >=', $from_date)
	// 		->where($tbl_packages.'.delivered_date_time <=', $to_date);
	// 	}
		

		// $this->db->where_in(
  //               'clinic.id', 
  //               "select doc_spec.clinic_id 
  //               from tbl_doctor_speciality as doc_spec
  //               where speciality_id in (select id from tbl_speciality where speciality_name like '%".$data_array['speciality_name']."%')", false);

//LEFT JOIN `tbl_login` ON `tbl_login`.`sa_id` = (SELECT user_id FROM hub_previlage where hub_id =`tbl_hub`.`id` limit 1 ) 

		// echo $this->db->get_compiled_select();die;
		// $this->db->group_by($tbl_hub.'.hub_id');
    	$query = $this->db->get();   	
		return $query->result_array();
	}

	public function account_statement_user_list_date($from_date,$to_date,$user_id) {
		$tbl_hub = 'tbl_hub';
		$tbl_packages = 'tbl_packages';		
		$this->db->select($tbl_hub.'.id,'.$tbl_hub.'.hub_name,'.$tbl_hub.'.vat,'.$tbl_hub.'.hub_id,'.$tbl_hub.'.created_date, login.sau_FName, login.sa_id');
		$this->db->select_sum($tbl_packages.'.rate', 'totalamount');		
		$this->db->from($tbl_hub);		
    	$this->db->join($tbl_packages, $tbl_hub.'.id ='.$tbl_packages.'.hub_id', 'left');
    	$this->db->join('hub_previlage as hub_pl', 'hub_pl.hub_id = tbl_hub.id', 'left');
    	$this->db->join('tbl_login as login', 'login.sa_id = hub_pl.user_id', 'left');
    	//$this->db->where($tbl_packages.'.status','delivered');
    	$this->db->group_by($tbl_hub.'.hub_id');
    	$this->db->where($tbl_packages.'.delivered_date_time >=', $from_date);
		$this->db->where($tbl_packages.'.delivered_date_time <=', $to_date);
		$this->db->where('hub_pl.user_id', $user_id);
    	$query = $this->db->get();   	
		return $query->result_array();
	}


	public function account_deduction_list_date($hub_id,$from_date,$to_date) {
		$tbl_hub = 'tbl_hub';
		$deductions = 'deductions';		
		$this->db->select($deductions.'.deduction_reason,'.$deductions.'.deduction_type');
		$this->db->select_sum($deductions.'.amount', 'deduct_amount');		
		$this->db->from($tbl_hub);		
    	$this->db->join($deductions, $tbl_hub.'.id ='.$deductions.'.hub_id_f', 'left');    	
    	// $this->db->group_by($deductions.'.deduction_reason');
    	$this->db->where($deductions.'.hub_id_f', $hub_id);
    	$this->db->where($deductions.'.date >=', $from_date);
		$this->db->where($deductions.'.date <=', $to_date);
		$this->db->group_by($deductions.'.deduction_reason');
		//echo $this->db->get_compiled_select();
    	$query = $this->db->get();   	
		return $query->result_array();
	}

	public function get_top_five_hub(){
    $this->db->select("AVG(success_rate) AS avg_success_rate,tbl_hub.hub_id,tbl_hub.hub_name, hub_previlage.user_id,tbl_login.company_name");
    $this->db->from("hub_performance");
    $this->db->join("tbl_hub", "hub_performance.hub_id_f=tbl_hub.id");
    $this->db->join('hub_previlage', 'hub_previlage.hub_id = tbl_hub.id', 'left');
    $this->db->join('tbl_login', 'hub_previlage.user_id = tbl_login.sa_id', 'left');

    $this->db->group_by("hub_performance.hub_id_f");
    //$this->db->limit('limit', 5);
    $this->db->order_by ( "avg_success_rate", "desc" );
    
    $this->db->limit('5');    
    $query = $this->db->get();
    return $query->result();
}

	public function get_top_five_hub_user($user_id){
    $this->db->select("AVG(success_rate) AS avg_success_rate,tbl_hub.hub_id,tbl_hub.hub_name, hub_previlage.user_id,tbl_login.company_name");
    $this->db->from("hub_performance");
    $this->db->join("tbl_hub", "hub_performance.hub_id_f=tbl_hub.id");
    $this->db->join('hub_previlage', 'hub_previlage.hub_id = tbl_hub.id', 'left');
    $this->db->join('tbl_login', 'hub_previlage.user_id = tbl_login.sa_id', 'left');

    $this->db->where('hub_previlage.user_id',$user_id);

    $this->db->group_by("hub_performance.hub_id_f");

    //$this->db->limit('limit', 5);
    $this->db->order_by ( "avg_success_rate", "desc" );
    
    $this->db->limit('5');  
    // echo $this->db->get_compiled_select();  
    $query = $this->db->get();
    return $query->result();
}


	// public function account_statement_list_date() {
	// 	$tbl_hub = 'tbl_hub';
	// 	$tbl_login = 'tbl_login';
	// 	$tbl_packages = 'tbl_packages';
	// 	$hub_previlage = 'hub_previlage';
	// 	//$deductions='deductions';
	// 	$this->db->select($tbl_hub.'.hub_name,'.$tbl_hub.'.vat,'.$tbl_hub.'.hub_id,'.$tbl_hub.'.created_date,'.$tbl_login.'.sau_FName');
	// 	$this->db->select_sum($tbl_packages.'.amount', 'totalamount');
	// 	//$this->db->select_sum($deductions.'.amount', 'totaldeduction');
	// 	$this->db->from($tbl_hub);
	// 	//$this->db->join($hub_previlage, $tbl_hub.'.id ='.$hub_previlage.'.hub_id', 'left');
 //    	//$this->db->join($tbl_login, $hub_previlage.'.user_id ='.$tbl_login.'.sa_id', 'left');
 //    	$this->db->join($tbl_packages, $tbl_hub.'.id ='.$tbl_packages.'.hub_id', 'left');
 //    	//$this->db->join($deductions, $tbl_hub.'.id ='.$deductions.'.hub_id_f', 'left');
 //    	$this->db->where($tbl_packages.'.status','delivered');
 //    	$this->db->group_by($tbl_hub.'.hub_id');
 //    	//echo $this->db->get_compiled_select();die;

 //  //this->db->where($tbl_packages.'.delivered_date_time >=', $from_date);
	// 	// $this->db->where($tbl_packages.'.delivered_date_time <=', $to_date);	


	// 	$query = $this->db->get();

	// 	return $query->result_array();
	// }



	public function getArraySelectedFieldsWhereCondition($table, $select_fields, $where) {
		$this->db->select($select_fields);
		$this->db->from($table);
		$this->db->where($where);
	    $query = $this->db->get();
    	return $query->result();	
	}

	public function user_list() {
		$hubs = $this->session->hubs;
		$query = $this->db
			->select(
				"sa_id, sau_name, sau_FName, sau_PhoneNo, user_address, user_type, country, created_at,is_active"
			)
			->from('tbl_login')
			//->where_in('hubs',$hubs)
			//->where_not_in('login.sa_id',1)
			//->group_by('sa_id')
			->get();
		return $query->result_array();
		//return $this->db->last_query();
	}

	public function gethub_were_user($table, $where){
		$hub_previlage = 'hub_previlage';
		$this->db->select($table.'.*');
		$this->db->from($hub_previlage);
		$this->db->join($table, $hub_previlage.'.hub_id='.$table.'.id', 'left'); 
		$this->db->where($where);
		$query = $this->db->get();
		return $query->result(); 
	}

	

    		/* start Total number of hubs*/
		public function total_hub($user_id = null) {
			if($user_id==null){
			$query = $this->db->query('SELECT * FROM tbl_hub');
			}
			else{
				$query = $this->db->query('SELECT * FROM hub_previlage');
				 $this->db->where('user_id', $user_id);
			}
			$query = $query->num_rows();
			return $query;
		}
		/*End Total hubs*/

		/* start Total number of partners*/
		public function total_partner($user_id = null) {		
			$query = $this->db->query('SELECT * FROM tbl_login');
			$this->db->where('user_type',1);
			$query = $query->num_rows();
			return $query;
		}
		/*End Total partners*/

		public function total_orders(){
			$query = $this->db->query('SELECT * FROM tbl_packages');
			$query = $query->num_rows();
			return $query;
		}
		public function total_los_packages(){
			$this->db->select('*');
			$this->db->from('tbl_packages');
			$this->db->where('status','lost');
			$query = $this->db->get();
			$query = $query->num_rows();
			return $query;
		}

		public function total_picked(){
			$this->db->select('*');
			$this->db->from('tbl_packages');
			$query = $this->db->get();
			$query = $query->num_rows();
			return $query;
		}

	public function total_picked_wherehub($table, $hub_id=null, $from_date=null, $to_date=null){
			$this->db->select('*');
			$this->db->from($table);
			//$this->db->where('status','delivered');
			$this->db->where('hub_id', $hub_id);
			if($from_date!=null && $to_date!=null){
			$this->db->where('delivered_date_time >=', $from_date);
			$this->db->where('delivered_date_time <=', $to_date);	
			}
			$query = $this->db->get();
			$query = $query->num_rows();
			return $query;
		}



		public function total_picked_wherehub_ear($table,$hub_id=null,$from_date, $to_date){
			$this->db->select('*');
			$this->db->from($table);
			//$this->db->where('status','delivered');
			$this->db->where('hub_id', $hub_id);				
			$this->db->where('delivered_date_time >=', $from_date);
			$this->db->where('delivered_date_time <=', $to_date);	
			$query = $this->db->get();
			$query = $query->num_rows();
			return $query;
		}


		/*total hub between date*/
		public function total_picked_wherehub_count($table,$hub_id=null,$from_date, $to_date){
			$this->db->select('*');
			$this->db->from($table);
			//$this->db->where('status','delivered');
			$this->db->where('hub_id', $hub_id);				
			$this->db->where('delivered_date_time >=', $from_date);
			$this->db->where('delivered_date_time <=', $to_date);	
			$query = $this->db->get();			
			$query = $query->num_rows();
			return $query;
		}
		/*end total hub between date*/


		/*total picked where hub_id */
		public function total_picked2($table,$hub_id=null){
			$this->db->select('*');
			$this->db->from($table);			
			$this->db->where('hub_id', $hub_id);
			//$this->db->where('status', 'delivered');
			$query = $this->db->get();			
			$query = $query->num_rows();
			return $query;
		}
		/*end total picked where hub_id */

		/*total picked where hub_id and between date */
		public function total_picked_between_date($table, $hub_id=null, $from_date, $to_date){
			$this->db->select('*');
			$this->db->from($table);				
			$this->db->where('hub_id', $hub_id);
			//$this->db->where('status', 'delivered');
			$this->db->where('delivered_date_time >=', $from_date);
			$this->db->where('delivered_date_time <=', $to_date);
			$query = $this->db->get();			
			$query = $query->num_rows();
			return $query;
		}
		/* total picked where hub_id and between date  */

		public function total_revenue($table,$hub_id=null,$from_date=null,$to_date=null){
			$this->db->select_sum('rate');
			$this->db->from($table);
			$this->db->where('hub_id', $hub_id);
			//$this->db->where('status', 'delivered');
			if($from_date!=null && $to_date!=null){
			$this->db->where('delivered_date_time >=', $from_date);
			$this->db->where('delivered_date_time <=', $to_date);	
			}
			$query = $this->db->get();
			$query = $query->row()->rate;
			return $query;
		}
        /*change kiya hai amount to rate*/
		public function total_deduction($table,$hub_id,$from_date,$to_date){
			$this->db->select_sum('amount');
			$this->db->from($table);
			$this->db->where('hub_id_f', $hub_id);
			//$this->db->where('status', 'delivered');
			$this->db->where('date >=', $from_date);
			$this->db->where('date <=', $to_date);	
			$query = $this->db->get();
			$query = $query->row()->amount;
			return $query;
		}

		public function total_revenue1($table,$hub_id=null,$from_date,$to_date,$where){
			$this->db->select_sum('rate');
			$this->db->from($table);
			if ($hub_id !== null) {					
					$this->db->where('hub_id', $hub_id);
					$this->db->where($where);
				}
			$this->db->where('delivered_date_time >=', $from_date);
			$this->db->where('delivered_date_time <=', $to_date);	
			$query = $this->db->get();
			$query = $query->row()->rate;
			return $query;
		}

		public function total_volume1($table,$hub_id=null,$from_date,$to_date,$where){
			$this->db->select('*');
			$this->db->from($table);			
			$this->db->where($where);
			$this->db->where('delivered_date_time >=', $from_date);
			$this->db->where('delivered_date_time <=', $to_date);	
			$query = $this->db->get();
			$query = $query->num_rows();
			return $query;
		}

	/* picked where hub_id to number of days*/
		public function total_picked_0_1($table,$hub_id=null,$from_date=null,$to_date=null,$where=null){
			$this->db->select('*');
			$this->db->from($table);			
			$this->db->where($where);
			if($from_date!=null && $to_date!=null){
			$this->db->where('delivered_date_time >=', $from_date);
			$this->db->where('delivered_date_time <=', $to_date);
			}
			$query = $this->db->get();			
			$query = $query->num_rows();
			return $query;
		}
		/* picked where hub_id to number of days*/


		/* changes for user_id */
		public function packages_list_by_hub($hub_id,$from_date=null,$to_date=null) {
			$this->db
				->select('hub.hub_name,hub.hub_id as hub, pack.*')
				->from('tbl_packages as pack')
				->join('tbl_hub as hub', 'pack.hub_id = hub.id', 'left');
			$this->db->where('pack.hub_id', $hub_id);
			if($from_date!=null && $to_date!=null){
			$this->db->where('delivered_date_time >=', $from_date);
			$this->db->where('delivered_date_time <=', $to_date);
			}
			$query = $this->db->get();
			return $query->result_array();
		}
		/* changes for user_id */
		
		public function hub_agreement_accepance(){
			$tbl_hub ='tbl_hub';
			$tbl_agreement_acceptence ='tbl_agreement_acceptence';
			$this->db
			->select('tbl_hub.hub_id, tbl_hub.hub_name, tbl_hub.agreement_name, tbl_hub.validity, tbl_agreement_acceptence.hub_id as hub, tbl_agreement_acceptence.acceptecnce_time, tbl_agreement_acceptence.full_name')
			->from('tbl_hub')
			->join('tbl_agreement_acceptence', 'tbl_hub.id=tbl_agreement_acceptence.hub_id','left outer');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function new_getallWhereResultForIdDESC($table,$where=array(),$order='',$cols='') {
			if($cols)
			{
				$this->db->select($cols);
			}
			else 
			{
				$this->db->select( '*' );
			}
			if(count($where))
			{
				$this->db->where($where);
			}
			if($order)
			{
				$this->db->order_by($order, "DESC" );
			}
			$query = $this->db->get( $table );
			$allData = $query->result();
			return $allData;
		}
		public function new_getPackage_list($table,$where=array(),$order='',$cols='') {
			if($cols)
			{
				$this->db->select($cols);
			}
			else 
			{
				$this->db->select( '*' );
			}
			$this->db->join('tbl_login', "tbl_login.sa_id = $table.creator", 'left');
			$this->db->join('tbl_company', "tbl_company.external_bussiness_id = $table.company");
			if(count($where))
			{
				$this->db->where($where);
			}
			if($order)
			{
				$this->db->order_by($order, "DESC" );
			}
			$query = $this->db->get( $table );
			$allData = $query->result();
			$set_array=array();
			foreach($allData as $listdata)
			{
				if($listdata->remittance_status=='Remitted')
				{
					$listdata->deleted="cannot delete";
				}
				else 
				{
					$listdata->deleted="<a href='javascript:void(0);' class='delete_packages' data-id='".$listdata->id ."'>Delete</a>";
				}
				unset($listdata->id);
				$set_array[]=$listdata;
			}
			return $set_array;
		}
		public function company_validdata()
		{
			$sel="select tbl_packages.*,tbl_company.company_name from tbl_packages INNER JOIN tbl_company ON tbl_company.external_bussiness_id = tbl_packages.company where tbl_packages.statement_id IS NULL and tbl_packages.remittance_status='Not Remitted' GROUP BY tbl_packages.company";
			$execute=$this->db->query($sel);
			return $execute->result();
		}
		public function get_remittancedata($where_array)
		{
			$sels="select tbl_remittance.*,tbl_company.company_name,tbl_login.sau_name as creator_name,anew.sau_name as payment_by from tbl_remittance INNER JOIN tbl_company ON tbl_company.external_bussiness_id = tbl_remittance.company LEFT JOIN tbl_login ON tbl_login.sa_id=tbl_remittance.creator LEFT JOIN tbl_login AS anew ON anew.sa_id=tbl_remittance.payment_editor";
			if(count($where_array))
			{
				$sels.=" where tbl_remittance.country='".$where_array['country']."'";
			}
			$execute=$this->db->query($sels);
			$data_res=$execute->result_array();
			$nrow_data=array();
			foreach($data_res as $row)
			{
				$sdata=array();
				$sel_num="select SUM(remittance_amount) as amount from tbl_packages where statement_id='".$row['statement_id']."'";
				$sel_query=$this->db->query($sel_num);
				$row_data=$sel_query->row_array();
				
				$sdata['statement_id']='<a class="btn_package_lists" data-val="'.$row['statement_id'].'" href="javascript:void(0);">'.$row['statement_id']."</a>";
				$sdata['country']=$row['country'];
				$sdata['company']=$row['company_name'];
				$sdata['remittace_amount']=$row_data['amount'];
				$sdata['remittance_type']=$row['remittance_type'];
				$sdata['remittance_status']=$row['remittance_status'];
				$sdata['payment_reference']=$row['payment_reference'];
				$sdata['payment_date']=$row['payment_date'];
				$sdata['creator']=$row['creator_name'];
				$sdata['create_at']=$row['create_at'];
				$sdata['payment_editor']=$row['payment_by'];
				$sdata['payment_edit_at']=$row['payment_edit_at'];
				if($row['remittance_status']=='Not Remitted')
				{
					$sdata['actions']='<button data-val="'.$row['statement_id'].'" class="btn btn-primary btn-xs remittance_btn_update" type="button">Update</button> <button data-val="'.$row['statement_id'].'" class="btn btn-danger btn-xs remittance_btn_delete" type="button">Delete</button>';
				}
				else 
				{
					$sdata['actions']='';
				}
				$nrow_data[]=$sdata;
			}
			return $nrow_data;
		}
			
		
}
?>