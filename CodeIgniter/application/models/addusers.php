<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addusers extends CI_Model
{
	function input_data($data_user,$table)
	{
		$this->db->insert($table,$data_user);
	}

	public function getUserQueryArray()
	{
		$query1 = $this->db->query("select * from user");
		return $query1->result_array();
	}

	public function getUserQueryObject()
	{
		$query1 = $this->db->query("select * from user");
		return $query1->result();
	}

	 public function DeleteData($id)
    {
      $this->db->query("DELETE from user where id =".$id);
    }
}
?>