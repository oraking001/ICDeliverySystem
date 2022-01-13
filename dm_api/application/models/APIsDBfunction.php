<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

// <APIsDBfunction-Properties>
// Author   : ashishP
// Date     : 26/July/2018 05:04 PM
// Descr    : for dbfunction using in APIs.

class APIsDBfunction extends CI_Model {
	function __construct() {
		parent::__construct ();
    }

	public function getArraySelectedFieldsWhereCondition($table, $select_fields, $where){
		$this->db->select($select_fields);
		$this->db->from($table);
		$this->db->where($where);

	    $query = $this->db->get();
    	return $query->result();
    }
    
    public function getMyJobs_WholeDetail($where = ''){

        $tmpWhere = '';
		if (!empty($where)){
			foreach ($where as $key => $value) {
				$tmpWhere .= (!empty($tmpWhere) ? ' and ' : '').' '.$key.' = '.$value;
			}
		}

        $sql = '
            select ord.o_id as OrderID, ord.order_no as OrderNo, ord.order_date as OrderDate, ord.dispatch_date as DispatchDate, cust.bp_name as CustomerName, 
                cust.bp_code as CustomerCode, cust.city as CustomerCity, cust.mobile_no as CustomerMobileNo, cust.email_id as CustomerEmailID,
                bag.bag_name as BagName, bag.type as BagType, ord.bag_weight as BagWeight, concat(ord.size_heigth, "x", ord.size_width) as Size, 
                ord.quantity as Qty, ord.measurement as Unit, ord.login_id
            from tbl_order as ord
                Left Outer Join tbl_customer as cust On (cust.customer_id = ord.cust_id)
                Left Outer Join bag_type as bag On (bag.bag_id = ord.bag_type)
            '. (!empty($tmpWhere) ? ' Where' : '').$tmpWhere.'
            order by ord.o_id desc;';

        $query = $this->db->query($sql);

        return $query->result();
    }

	public function getAllDataSelectFields($table, $select_fields, $group_by = ''){
		$this->db->select($select_fields);
        $this->db->from($table);
        $this->db->group_by($group_by);
        
	    $query = $this->db->get();
    	return $query->result();
    }

    public function getFabricTable($height, $qty, $where = ''){

        $tmpWhere = '';
		if (!empty($where)){
			foreach($where as $key => $value){
				$tmpWhere .= (!empty($tmpWhere) ? ' and ' : '').' '.$key.' = '.$value;
			}
        }
        
        $this->db->query('set @height := '.$height.' + 1.8;');
        $this->db->query('set @qty := '.$qty.' / 39.4;');
        $this->db->query('set @meter := (@height * @qty);');
        $this->db->query('set @fixPerc := ((@meter * 2) / 100);');
        $this->db->query('set @meter := @meter + @fixPerc;');

        $script = '
        select id, size, code, avrage, filter, color, stock, ((filter / 1000) * @meter) as totalWeight,
            (stock - ((filter / 1000) * @meter)) as availStock
        from tbl_inventory 
        '. (!empty($tmpWhere) ? ' Where' : '').$tmpWhere.'
        order by id desc';

        $query = $this->db->query($script);
        return $query->result();
    }
}