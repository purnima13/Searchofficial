<?php
class Ajaxsearch_model extends CI_Model
{
	function fetch_data($query)
	{
		$this->db->select("*");
		$this->db->from("tbl_stock");
		if($query != '')
		{
			$this->db->like('SName',$query);
		    $this->db->or_like('Current_Market_Price', $query);

		}
		$this->db->order_by('SNo','asc');
		return $this->db->get();
	}
}
?>
