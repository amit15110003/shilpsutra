<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'html','text','typography','date'));
		$this->load->library(array('session', 'form_validation','pagination','cart','facebook','google'));
		$this->load->database();
		$this->load->model('user');
	}

	public function index($category,$id)
	{	
		$details['query']=$this->user->showproduct();
		$this->load->view('header',$details);
		$this->load->view('single-product.php',$details);
	}

	public function category($category)
	{	
		$category1 = str_replace('-', ' ', $category);
		$config = array();
        $config["base_url"] = base_url() . "index.php/product/category/$category";
        $config["total_rows"] = $this->user->countproduct_category($category1);
        $config["per_page"] = 32;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $details['query'] = $this->user->showproduct_category($config["per_page"],$page,$category1);
        $details["links"] = $this->pagination->create_links();
        $details['query1'] =$this->user->showtag($category1);
		$details['categoryval']=$category1;
		$this->load->view('client/header');
		$this->load->view('client/category',$details);
		$this->load->view('client/footer');
	}

	public function details($category,$title)
	{	
		$category = str_replace('-', ' ', $category);
		$title = str_replace('-', ' ', $title);
		$details=$this->user->get_product_id($category,$title);
		$data['query1']=$this->user->get_review_id($details[0]->id);
		$data['query2']=$this->user->showproduct_mostview_cat($category);
			$data['id'] = $details[0]->id;
			$data['picture'] = $details[0]->picture;
			$data['title'] = $details[0]->title;
        	$data['Descr'] = $details[0]->Descr;
        	$data['category'] = $details[0]->category;
        	$data['love'] = $details[0]->love;
        	$data['artist'] = $details[0]->artist;
        	$data['tag'] = $details[0]->tag;
        	$data['review'] = $details[0]->review;
        	$data['view'] = $details[0]->view;
        	$view=$data['view']+1;
		$this->user->updateview($details[0]->id,$view);
		$this->load->view('client/header',$details);
		$this->load->view('client/product',$data);
		$this->load->view('client/footer');
	}

	 function viewsort($category){
        $sortBy = $this->input->post('sortBy');
        $tag = $this->input->post('tag');
        $category1 = str_replace('%20', ' ',$category);
        $category2 = str_replace(' ', '-', $category1);
        $config = array();
        $config["base_url"] = base_url() . "index.php/product/category/$category2";
        $config["total_rows"] = $this->user->countproduct_sort($category1,$tag);
        $config["per_page"] = 32;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		if($sortBy=="popular")
		{
			$details['query']=$this->user->sortproduct_popular($config["per_page"],$page,$category1,$tag);
		}
		else if($sortBy=="new")
		{
			$details['query']=$this->user->sortproduct_new($config["per_page"],$page,$category1,$tag);
		}
		else if($sortBy=="default")
		{
			$details['query']=$this->user->sortproduct($config["per_page"],$page,$category1,$tag);
		}
        $details["links"] = $this->pagination->create_links();
		$details['categoryval']=$category1;
		$this->load->view('client/category1',$details);
    }


    public function artist($artist)
	{	
		$artist = str_replace('-', ' ', $artist);
		$config = array();
        $config["base_url"] = base_url() . "index.php/product/artist/$artist";
        $config["total_rows"] = $this->user->countproduct_artist($artist);
        $config["per_page"] = 16;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $details['query'] = $this->user->showproduct_artist($config["per_page"], $page,$artist);
        $details["links"] = $this->pagination->create_links();
		$details['categoryval']=$artist;
		$this->load->view('client/header');
		$this->load->view('client/artist',$details);
		$this->load->view('client/footer');
	}

	public function details_artist($category,$title)
	{	
		$category = str_replace('%20', ' ', $category);
		$details=$this->user->get_product_id($category,$title);
		$data['query']=$this->user->get_image_id($details[0]->id);
		$data['query1']=$this->user->get_review_id($details[0]->id);
		$data['query2']=$this->user->showproduct_mostview_cat($category);
			$data['id'] = $details[0]->id;
			$data['picture'] = $details[0]->picture;
			$data['title'] = $details[0]->title;
        	$data['Descr'] = $details[0]->Descr;
        	$data['category'] = $details[0]->category;
        	$data['love'] = $details[0]->love;
        	$data['review'] = $details[0]->review;
        	$data['view'] = $details[0]->view;
        	$view=$data['view']+1;
		$this->user->updateview($details[0]->id,$view);
		$this->load->view('client/header',$details);
		$this->load->view('client/product',$data);
		$this->load->view('client/footer');
	}

	 function viewsort_artist($category){
        $sortBy = $this->input->post('sortBy');
        $category = str_replace('%20', ' ', $category);
        $details['categoryval']=$category;
		$details['category']=$this->user->showcategory();
        if($sortBy=="high")
        {
		$details['query']=$this->user->sortproduct_high($category);
		}
		else if($sortBy=="low")
		{
			$details['query']=$this->user->sortproduct_low($category);
		}
		else if($sortBy=="popular")
		{
			$details['query']=$this->user->sortproduct_popular($category);
		}
		else if($sortBy=="new")
		{
			$details['query']=$this->user->sortproduct_new($category);
		}
		else
		{
			$details['query']=$this->user->sortproduct($category);
		}
		$this->load->view('client/category1',$details);
    }


	public function login()
    {
		// get form input
		$email = $this->input->post("email");
        $password = $this->input->post("password");

		// form validation
		$this->form_validation->set_rules("email", "Email-ID", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		
		if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
		}
		else
		{
			// check for user credentials
			$uresult = $this->user->get_user($email,$password);
			if (count($uresult) > 0)
			{
				// set session
				$sess_data = array('login' => TRUE, 'fname' => $uresult[0]->fname,'lname' => $uresult[0]->lname, 'uid' => $uresult[0]->id,'email'=> $uresult[0]->email,'contact'=> $uresult[0]->contact);

				$this->session->set_userdata($sess_data);
				
				redirect('');
				
			}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
				redirect('');
			}
		}
    }

    
	function logout()
	{
		// destroy session
        $data = array('login' => '', 'uname' => '', 'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('');
	}
}
