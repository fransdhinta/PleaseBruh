<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Model
{
	function input_data($data_blog,$table)
	{
		$this->db->insert($table,$data_blog);
	}

	public function getBlogQueryArray()
	{
		$query = $this->db->query("select * from blog");
		return $query->result_array();
	}

	public function getBlogQueryObject()
	{
		$query = $this->db->query("select * from blog");
		return $query->result();
	}

	function data($number, $offset = 0)
	{
		return $query = $this->db->get('blog',$number,$offset)->result();
	}

	function jumlah_data()
	{
		return $this->db->get('blog')->num_rows();
	}
}
?>