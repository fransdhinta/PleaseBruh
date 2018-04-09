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
		$this->load->view('list');
	}

	public function view()
	{
		$this->load->view('view');
	}	

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

		$data_blog = array
		('id' => $id,
		 'author' => $author,
		 'date' => $date,
		 'title' => $title,
		 'content' => $content,
		 'image_file' => $image);

		$this->blog->input_data($data_blog,'blog');
		redirect('home/create');
	}

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
}
