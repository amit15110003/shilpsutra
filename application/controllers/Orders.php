<?php
class orders extends CI_Controller
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
		$details['query'] = $this->user->showorder($this->session->userdata('uid'));
			$this->load->view('client/header');
			$this->load->view('client/order',$details);
			$this->load->view('client/footer');
        }

	public function order_cancel()
	    {
	    	$uid=$this->session->userdata('uid');
	    	$id=$this->input->post('postid');
	    	$status1="cancel";
	    	$dpo= date("Y-m-d H:i:s");
		$this->db->query('update itemorder set  status1="'.$status1.'",dpo="'.$dpo.'" where id="'.$id.'" and uid="'.$uid.'"');
	    }	
	
		
}