<?php
class checkout extends CI_Controller
{
		public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'html','text','typography','date'));
		$this->load->library(array('session', 'form_validation','pagination','cart','facebook','google'));
		$this->load->database();
		$this->load->model('user');
	}
	
	public function index()
	{	
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]');
		if ($this->form_validation->run() == FALSE)
        {
		$data['query']=$this->user->showcart($this->session->userdata('uid'));
		$details1=$this->user->deliveryadd($this->session->userdata('uid'));
			$details2=$this->user->shippingadd($this->session->userdata('uid'));
			if(!empty($details1)){
			$data['fname'] = $details1[0]->fname;
			$data['lname'] = $details1[0]->lname;
			$data['country'] = $details1[0]->country;
			$data['state'] = $details1[0]->state;
			$data['town'] = $details1[0]->town;
			$data['addr'] = $details1[0]->addr;
			$data['mob'] = $details1[0]->mob;
			$data['pin'] = $details1[0]->pin;
			}
			else{
			$data['fname'] = "";
			$data['lname'] = "";
			$data['country'] = "";
			$data['state'] ="";
			$data['town'] = "";
			$data['addr'] ="";
			$data['mob'] = "";
			$data['pin'] ="";
			}
			if(!empty($details2)){
			$data['fname1'] = $details2[0]->fname;
			$data['lname1'] = $details2[0]->lname;
			$data['country1'] = $details2[0]->country;
			$data['state1'] = $details2[0]->state;
			$data['town1'] = $details2[0]->town;
			$data['addr1'] = $details2[0]->addr;
			$data['mob1'] = $details2[0]->mob;
			$data['pin1'] = $details2[0]->pin;
			}
			else{
			$data['fname1'] = "";
			$data['lname1'] = "";
			$data['country1'] = "";
			$data['state1'] ="";
			$data['town1'] = "";
			$data['addr1'] ="";
			$data['mob1'] = "";
			$data['pin1'] ="";
			}
		$this->load->view('client/header');
		$this->load->view('client/checkout',$data);
		$this->load->view('client/footer');
		}
		else{
			$uid=$this->session->userdata('uid');
			$data = array(
				
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'mob' =>  $this->input->post('mob'),
				'country' => $this->input->post('country'),
				'addr' => $this->input->post('addr'),
				'state' => $this->input->post('state'),
				'town' => $this->input->post('town'),
				'pin' =>  $this->input->post('pin'));
				$result=$this->user->update_delivery($data,$uid);
		if ($result)
			{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center"> Successfully Updated</div>');
				redirect('checkout/payment');
			}
			else
			{
				// error
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Something Went Wrong</div>');
				redirect('checkout/payment');
			}

		}
	}

	public function payment()
	{	
		
		$details['query']=$this->user->showcart($this->session->userdata('uid'));
		$details1=$this->user->deliveryadd($this->session->userdata('uid'));
		$data['fname'] = $details1[0]->fname;
		$data['lname'] = $details1[0]->lname;
		$data['country'] = $details1[0]->country;
		$data['state'] = $details1[0]->state;
		$data['town'] = $details1[0]->town;
		$data['addr'] = $details1[0]->addr;
		$data['mob'] = $details1[0]->mob;
		$data['pin'] = $details1[0]->pin;
		$this->load->view('header');
		$this->load->view('checkout1',$data);
		
	}
	
	 public function remove_cart()
    {
    	$uid=$this->session->userdata('uid');
    	$id=$this->input->post('postid');
		$this->db->delete('cart', array('id'=>$id,
                                          'uid'=>$uid));
    }

    public function pay_success()
    {
    	$this->load->view('header');
		$this->load->view('success');
    }

	
		
}