<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
	}

	public function index()
	{
		$this->load->model('biodata');
		$data['biodata_array']=$this->biodata->getBiodataQueryArray();
		$data['biodata_object']=$this->biodata->getBiodataQueryObject();
		$this->load->view('home',$data);
	}

	public function loginpage(){
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
                if ($user->email) {
                    $this->session->set_flashdata("success","You're Logged in");

                    $_SESSION['user_logged'] =TRUE;
                    $_SESSION['username'] = $user->username;

                    redirect("home/userprofile", "refresh");
                }else {
                    $this->session->set_flashdata("error", "No data in database");
                    redirect("home/login", "refresh");
                }
          
            }
        }
        
        $this->load->view('login');
    }

	public function userprofile()
	{
		$this->load->view('userprofile');
	}

	public function about()
	{
		$this->load->view('about');
	}

	public function contact()
	{
		$this->load->view('contact');
	}

	public function news()
	{
		$this->load->view('news');
	}

	public function list()
	{
		$this->load->model('blog');
		$this->load->database();
		$jumlah_data = $this->blog->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url(). 'home/list/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 3;
		$from = $this->uri->segment(1);
		$this->pagination->initialize($config);
		$data['blog'] = $this->blog->data($config['per_page'].$from);
		$data['blog_array']=$this->blog->getBlogQueryArray();
		$data['blog_object']=$this->blog->getBlogQueryObject();
		$this->load->view('list', $data);
	}

	public function view()
	{
		$this->load->model('blog');
		$data['datablog'] = $this->blog->getBlogQueryArray();
		$this->load->view('view', $data);
	}	

	

	//======= MULAI CRUD ========

	public function create()
	{
		$this->load->view('create');
		
	}

	public function categories()
	{
		$this->load->view('categories');
		
	}

	public function register()
	{
		$this->load->view('register');
		
	}

	public function inputData()
	{
		$this->load->model('blog');
		$id = $this->input->post('id');
		$author = $this->input->post('author');
		$date = $this->input->post('date');
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$image = $this->input->post('image');

		$config['upload_path']		=	'./uploads/';
		$config['allowed_types']	=	'gif|jpg|png|jpeg';
		$config['max_size']			=	1000000;
		$config['max_width']		=	1920;
		$config['max_height']		=	1080;

		$this->load->library('upload', $config);

		if (! $this->upload->do_upload('image')) 
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('create', $error);
		}
		
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$upload_data = $this->upload->data();
		$file_name = $upload_data['file_name'];

		$data_blog = array
		('id' => $id,
		 'author' => $author,
		 'date' => $date,
		 'title' => $title,
		 'content' => $content,
		 'image_file' => $file_name);
		}

		

		$this->blog->input_data($data_blog,'blog');
		redirect('home/create');
	}

	public function inputCategories()
	{
		$this->load->model('categories');
		$name = $this->input->post('cat_name');
		$desc = $this->input->post('cat_description');
		
		$data_categories = array
		('cat_name' => $name,
		 'cat_description' => $desc);
		

		$this->categories->input_data($data_categories,'categories');
		redirect('home/categories');
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
		redirect('home/register');
	}

	//======= AKHIR CRUD ========

	
}