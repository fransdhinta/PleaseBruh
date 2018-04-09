<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Model
{
	function input_data($data_blog,$table)
	{
		$this->db->insert($table,$data_blog);
	}
}
?>