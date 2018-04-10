<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('biodata');
		$data['biodata_array']=$this->biodata->getBiodataQueryArray();
		$data['biodata_object']=$this->biodata->getBiodataQueryObject();
		$this->load->view('home',$data);
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
		$data['blog_array']=$this->blog->getBlogQueryArray();
		$data['blog_object']=$this->blog->getBlogQueryObject();
		$this->load->view('list', $data);
	}

	public function view()
	{
		$this->load->view('view');
	}	

	//======= MULAI CRUD ========

	public function create()
	{
		$this->load->view('create');
		
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
		$config['allowed_types']	=	'gif|jpg|png';
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
		}

		$upload_data = $this->upload->data();
		$file_name = $upload_data['file_name'];

		$data_blog = array
		('id' => $id,
		 'author' => $author,
		 'date' => $date,
		 'title' => $title,
		 'content' => $content,
		 'image_file' => $file_name);

		$this->blog->input_data($data_blog,'blog');
		redirect('home/create');
	}

	public function uploadFile()
	{

	}

	//======= AKHIR CRUD ========

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
	}
}
