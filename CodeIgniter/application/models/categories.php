<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Model
{
	function input_data($data_categories,$table)
	{
		$this->db->insert($table,$data_categories);
	}

	public function getCategoriesQueryArray()
	{
		$query = $this->db->query("select * from categories");
		return $query->result_array();
	}

	public function getCategoriesQueryObject()
	{
		$query = $this->db->query("select * from categories");
		return $query->result();
	}
}
?>