<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
	}

	public function home()
	{
		$this->load->view('user/header');
		$this->load->view('user/home');
	}
}