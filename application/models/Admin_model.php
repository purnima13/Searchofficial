<?php
class Admin_model extends CI_Model
{
	function check_login($email,$password)
	{
		$this->db->select("*");
		$this->db->from("admin");
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$this->db->where('status',1);
        
		$query = $this->db->get();
        return $query;
 //        if($query->num_rows()>0){
 //        	return $query->result_array();
 //        }
 //        else
 //        	return "Admin not available!!";
	 }
}
?>
