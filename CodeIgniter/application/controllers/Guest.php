<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
	}

	public function index()
	{
		$this->load->view('guest/header');
		$this->load->model('biodata');
		$data['biodata_array']=$this->biodata->getBiodataQueryArray();
		$data['biodata_object']=$this->biodata->getBiodataQueryObject();
		$this->load->view('guest/home',$data);
	}

	public function login(){
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            if ($this->form_validation->run() == TRUE) {

                $username = $_POST['username'];
                $password = $_POST['password'];

                $this->db->select('*');
                $this->db->from('user');
                $this->db->where(array('username' => $username, 'password' => $password));
                $query = $this->db->get();

                $user = $query->row();
                if ($user->email && $user->username == 'Admin') 
                {
                    $this->session->set_flashdata("success","You're Logged in");

                    $_SESSION['user_logged'] =TRUE;
                    $_SESSION['username'] = $user->username;

                    redirect("admin/home", "refresh");
                }

                else if ($user->email) 
                {
                    $this->session->set_flashdata("success","You're Logged in");

                    $_SESSION['user_logged'] =TRUE;
                    $_SESSION['username'] = $user->username;

                    redirect("user/home", "refresh");
                }

                else 
                {
                    $this->session->set_flashdata("error", "No data in database");
                    redirect("guest/login", "refresh");
                }
          
            }
        }
        
        $this->load->view('guest/login');
    }

	public function about()
	{
		$this->load->view('guest/header');
		$this->load->view('guest/about');
	}

	public function contact()
	{
		$this->load->view('guest/header');
		$this->load->view('guest/contact');
	}

	public function news()
	{
		$this->load->view('guest/header');
		$this->load->view('guest/news');
	}

	public function register()
	{
		$this->load->view('guest/header');
		$this->load->view('guest/register');
		
	}

	public function userRegister()
	{
		$this->load->model('register');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');

		$data_user = array
		('username' => $username,
		 'password' => $password,
		 'email' => $email);
		


		$this->register->register_user($data_user,'user');
		redirect('guest/register');
	}

}