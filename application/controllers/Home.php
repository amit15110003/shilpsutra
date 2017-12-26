<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{	
		
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation','pagination','cart','facebook','google'));
		$this->load->database();
		$this->load->model('user');

	}

	public function index()
	{	
	    
		$this->load->view('client/header.php');
		$this->load->view('client/index');
		$this->load->view('client/footer1');
	}
	public function about()
	{	
		$this->load->view('client/header');
		$this->load->view('client/about');
		$this->load->view('client/footer');
	}
	public function size()
	{	
		$this->load->view('client/header');
		$this->load->view('client/size');
		$this->load->view('client/footer');
	}
	public function contact()
	{	
		$this->load->view('client/header');
		$this->load->view('client/contact');
		$this->load->view('client/footer');
	}
	public function international()
	{	
		$this->load->view('client/header');
		$this->load->view('client/international');
		$this->load->view('client/footer');
	}
	public function refund()
	{	
		$this->load->view('client/header');
		$this->load->view('client/refund');
		$this->load->view('client/footer');
	}
	public function care()
	{	
		$this->load->view('client/header');
		$this->load->view('client/care');
		$this->load->view('client/footer');
	}
	public function news()
	{	
		$this->load->view('client/header');
		$this->load->view('client/news');
		$this->load->view('client/footer');
	}
	public function testimonials()
	{	
		$this->load->view('client/header');
		$this->load->view('client/testimonials');
		$this->load->view('client/footer');
	}

	public function terms()
	{	
		$this->load->view('client/header');
		$this->load->view('client/terms');
		$this->load->view('client/footer');
	}
	public function policy()
	{	
		$this->load->view('client/header');
		$this->load->view('client/policy');
		$this->load->view('client/footer');
	}
	public function faqs()
	{	
		$this->load->view('client/header');
		$this->load->view('client/faq');
		$this->load->view('client/footer');
	}
	public function delivery()
	{	
		$this->load->view('client/header');
		$this->load->view('client/delivery');
		$this->load->view('client/footer');
	}
	public function blog()
	{	
	    $details['query']=$this->user->showblog();
		$this->load->view('client/header');
		$this->load->view('client/blog',$details);
		$this->load->view('client/footer');
	}
	public function blog_details()
	{	
	    
		$this->load->view('client/header');
		$this->load->view('client/blog_details');
		$this->load->view('client/footer');
	}
	function search_keyword()
	{
		if (empty($this->input->post('keyword')))
        {
			redirect($_SERVER['HTTP_REFERER']);
		}else
		{

    	$keyword = $this->input->post('keyword');
		$config = array();
        $config["base_url"] = base_url() . "index.php/home/search_keyword";
        $config["total_rows"] = $this->user->countproduct_search($keyword);
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
    	$this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $details['query'] = $this->user->search($config["per_page"], $page,$keyword);
        $details["links"] = $this->pagination->create_links();
    	$details['category']=$this->user->showcategory();
		$this->load->view('client/header',$details);
    	$this->load->view('client/search',$details);
    	$this->load->view('client/footer',$details);
    	}
	}
	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect($_SERVER['HTTP_REFERER']);
	}
	

}
