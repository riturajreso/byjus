<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Model {
	
	public function getLinkData()
	{
		$this->load->database();
		$res = $this->db->query("SELECT * FROM college_data");
		$result = $res->result_array();
		return $result;
	}
	public function inser_data($data)
	{
		$first_name = $data['first_name'];
		$last_name  = $data['last_name'];
		$this->load->database();
		$res = $this->db->insert("INSERT INTO `mp_users` (`ui_id`, `first_name`, `last_name`) VALUES (NULL, ".$first_name.", ".$last_name.")");
		$this->db->insert('posts',$post_data);
    	return $this->db->insert_id(); 
	}
}
