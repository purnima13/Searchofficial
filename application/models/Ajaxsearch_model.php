<?php
class Ajaxsearch_model extends CI_Model
{
	function search_title($title){
        $this->db->like('SName', $title , 'both');
        $this->db->order_by('SNo', 'ASC');
        $this->db->limit(5);
        return $this->db->get('tbl_stock')->result();
    }
}
?>
