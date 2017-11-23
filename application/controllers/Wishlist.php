<?php
class wishlist extends CI_Controller
{
	public function __construct()
	{	
		
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation','facebook','google'));
		$this->load->database();
		$this->load->model('user');
		if(!$this->session->userdata('uid')){
                redirect('login', 'refresh');
         }

	}
	
	public function index()
	{
		$details['query']=$this->user->showwishlist($this->session->userdata('uid'));
		$this->load->view('client/header');
		$this->load->view('client/wishlist',$details);
		$this->load->view('client/footer');
	}

	 public function remove_wish()
    {
    	$uid=$this->session->userdata('uid');
    	$id=$this->input->post('postid');
		$this->db->delete('wishlist', array('id'=>$id,
                                          'uid'=>$uid));
    }
	 public function move_cart()
    {
    	$uid=$this->session->userdata('uid');
    	$id=$this->input->post('postid');
    	$this->db->query('INSERT INTO cart (uid,productid,attributevalue,item)
                     SELECT uid,productid,attributevalue,item from wishlist where id='.$id.'&& uid='.$uid.'');
        $this->db->delete('wishlist',array('id'=>$id,
                                          'uid'=>$uid)); 
    }
		
}