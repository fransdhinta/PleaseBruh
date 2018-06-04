<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
	}

	public function home()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/home');
	}

	public function list()
	{
		$this->load->view('admin/header');
		$this->load->model('blog');
		$this->load->database();
		$jumlah_data = $this->blog->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url(). 'admin/list/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 3;
		$from = $this->uri->segment(1);
		$this->pagination->initialize($config);
		$data['blog'] = $this->blog->data($config['per_page'].$from);
		$data['blog_array']=$this->blog->getBlogQueryArray();
		$data['blog_object']=$this->blog->getBlogQueryObject();
		$this->load->view('admin/list', $data);
	}

	public function view()
	{
		$this->load->view('admin/header');
		$this->load->model('blog');
		$data['datablog'] = $this->blog->getBlogQueryArray();
		$this->load->view('admin/view', $data);
	}	

	

	//======= MULAI CRUD ========

	public function create()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/create');
		
	}

	public function categories()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/categories');
		
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
			$this->load->view('admin/create', $error);
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
		redirect('admin/create');
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
		redirect('admin/categories');
	}

	//======= AKHIR CRUD ========

	
}