<?php
class login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation','cart','facebook','google'));
		$this->load->database();
		$this->load->model('user');
			if($this->session->userdata('uid')){
                redirect('', 'refresh');
         }
	}
	public function index(){
			// Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
			$data['loginURL'] = $this->google->loginURL();
			$this->load->view('client/header');
			$this->load->view('client/login',$data);
			$this->load->view('client/footer');
        
        }
        
    	public function facebook(){
		$sess_data = array();
		
		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,fname,lname,email,gender,picture');

            // Preparing data for database insertion
            $sess_data['oauth_provider'] = 'facebook';
            $sess_data['oauth_uid'] = $userProfile['id'];
            $sess_data['fname'] = $userProfile['fname'];
            $sess_data['lname'] = $userProfile['lname'];
            $sess_data['email'] = $userProfile['email'];
            $sess_data['gender'] = $userProfile['gender'];
            $sess_data['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $sess_data['picture_url'] = $userProfile['picture']['data']['url'];
			
            // Insert or update user data
            $userID = $this->user->checkUser($sess_data);
			
			// Check user data insert or update status
            if(!empty($userID)){
               $data['sess_data'] = $sess_data;
                $this->session->set_userdata('sess_data',$sess_data);
            } else {
               $data['sess_data'] = array();
            }
			
		
		redirect($_SERVER['HTTP_REFERER']);
		} 
		else{
            	redirect('login/index');
        }
        
        }
    	public function google(){
    	    
		if(isset($_GET['code'])){
			//authenticate user
			$this->google->getAuthenticate();
			
			//get user info from google
			$gpInfo = $this->google->getUserInfo();
			
            //preparing data for database insertion
			$sess_data['oauth_provider'] = 'google';
			$sess_data['oauth_uid'] 		= $gpInfo['id'];
            $sess_data['first_name'] 	= $gpInfo['given_name'];
            $sess_data['last_name'] 		= $gpInfo['family_name'];
            $sess_data['email'] 			= $gpInfo['email'];
			$sess_data['gender'] 		= !empty($gpInfo['gender'])?$gpInfo['gender']:'';
			$sess_data['locale'] 		= !empty($gpInfo['locale'])?$gpInfo['locale']:'';
            $sess_data['profile_url'] 	= !empty($gpInfo['link'])?$gpInfo['link']:'';
            $sess_data['picture_url'] 	= !empty($gpInfo['picture'])?$gpInfo['picture']:'';
			
			//insert or update user data to the database
            $userID = $this->user->checkUser($sess_data);
			
			//store status & user info in session
			$this->session->set_userdata('loggedIn', true);
			$this->session->set_userdata('sess_data', $sess_data);
			
			redirect($_SERVER['HTTP_REFERER']);
		} 
		else{
            	redirect('login/index');
        }
        
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
			$this->load->view('client/header');
			$this->load->view('client/login');
			$this->load->view('client/footer');
		}
		else
		{
			// check for user credentials
			$uresult = $this->user->get_user($email, $password);
			if (count($uresult) > 0)
			{
				// set session
				
				$sess_data = array('login' => TRUE, 'fname' => $uresult[0]->fname,'lname' => $uresult[0]->lname, 'uid' => $uresult[0]->id,'email'=> $uresult[0]->email,'contact'=> $uresult[0]->contact);

				$this->session->set_userdata($sess_data);
				if ($cart = $this->cart->contents())
				{
					foreach ($cart as $item)
					{
						$uid=$this->session->userdata('uid');
						$postid=$item['id'];
						$qty=$item['qty'];
						$attributevalue=$item['attributevalue'];
						$checkcart = $this->db->query('select * from cart 
					                            where productid="'.$postid.'" and
					                            attributevalue="'.$attributevalue.'" and uid = "'.$uid.'"');
						$resultcheckcart = $checkcart->num_rows();


						if($resultcheckcart == '0' ){
						$data=array('productid'=>$postid,'uid'=>$uid,'item'=>$qty,'attributevalue'=>$attributevalue);
						$this->db->insert('cart',$data);
						}
						else if($resultcheckcart >='1' ){
						$data=$this->user->get_cart_qty($uid,$postid,$attributevalue);
			    		$item1=$data[0]->item;
			    		$item=$item1+$qty;
						$this->db->query('update cart set item="'.$item.'" where productid="'.$postid.'" and attributevalue="'.$attributevalue.'" and uid="'.$uid.'"');
						}		
			    	}
			    }
				$this->cart->destroy();
				redirect($_SERVER['HTTP_REFERER']);
		}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert text-center">Wrong Email-ID or Password!</div>');
				redirect('login/index');
			}
		}
    }
}