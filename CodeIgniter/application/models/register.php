<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Model
{
	function register_user($data_user,$table)
	{
		$this->db->insert($table,$data_user);
	}
}