<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Userauthentication extends CI_Controller
{
    function __construct() {
		parent::__construct();
		
		// Load facebook library
		
		$this->load->helper(array('form','url', 'html','text','typography','date'));
		$this->load->library(array('session', 'form_validation','pagination','cart','facebook','google'));
		
		//Load user model
		$this->load->model('user');
    }
    
     public function facebook(){
		$sess_data = array();
		
		// Check if user is logged in
		if($this->facebook->is_authenticated()){
			// Get user facebook profile details
			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');


            // Preparing data for database insertion
            $sess_data['oauth_provider'] = 'facebook';
            $sess_data['oauth_uid'] = $userProfile['id'];
            $sess_data['fname'] = $userProfile['first_name'];
            $sess_data['lname'] = $userProfile['last_name'];
            $sess_data['email'] = $userProfile['email'];
            $sess_data['gender'] = $userProfile['gender'];
            $sess_data['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $sess_data['picture_url'] = $userProfile['picture']['data']['url'];
			
            // Insert or update user data
            $userID = $this->user->checkUser($sess_data);
			
			// Check user data insert or update status
            if(!empty($userID)){
                $uresult=$this->user->get_user_by_id($userID);{
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
				$this->cart->destroy();}
            } else {
               $data['sess_data'] = array();
               $userID = $this->user->checkUser($sess_data);
            }
			
		}else{
            $fbuser = '';
			
			// Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }
		redirect($_SERVER['HTTP_REFERER']);
    }
    
	public function logout() {
		// Remove local Facebook session
		$this->facebook->destroy_session();
		// Remove user data from session
		$this->session->unset_sess_data('sess_data');
		// Redirect to login page
        redirect('/user_authentication');
    }
}
