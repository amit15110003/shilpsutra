<?php
class cart extends CI_Controller
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
		$details['query']=$this->user->showcart($this->session->userdata('uid'));
		$this->load->view('client/header');
		$this->load->view('client/cart',$details);
		$this->load->view('client/footer');
	}

	 public function remove_cart()
    {
    	$uid=$this->session->userdata('uid');
    	$id=$this->input->post('postid');
		$this->db->delete('cart', array('id'=>$id,
                                          'uid'=>$uid));
    }

    public function itemadd()
    {
    	$uid=$this->session->userdata('uid');
    	$id=$this->input->post('id');
    	$item=$this->input->post('item');
		$this->db->query('update cart set item="'.$item.'" where id="'.$id.'" and uid="'.$uid.'"');
    }

	  public function cartadd()
	{	
		$uid=$this->session->userdata('uid');
		$postid=$this->input->post('id');
		$qty=$this->input->post('qty');
		$attributevalue=$this->input->post('attributevalue');
		$checkcart = $this->db->query('select * from cart 
			                            where productid="'.$postid.'" and attributevalue="'.$attributevalue.'"
			                            and uid = "'.$uid.'"');
		$resultcheckcart = $checkcart->num_rows();


		if($resultcheckcart == '0' ){
		$data=array('productid'=>$postid,'uid'=>$uid,'item'=>$qty,'attributevalue'=>$attributevalue);
		$this->db->insert('cart',$data);
		}
		else if($resultcheckcart >='1' ){
			$data=$this->user->get_cart_qty($uid,$postid,$attributevalue);
    		$item1=$data[0]->item;
    		$item=$item1+1;
			$this->db->query('update cart set item="'.$item.'" where productid="'.$postid.'" and attributevalue="'.$attributevalue.'" and uid="'.$uid.'"');
			}
	}
	 public function cartadd1()
	{
	 
		$data = array(
        'id'  =>$this->input->post('id'),
        'qty'     => $this->input->post('qty'),
        'price'   => 39.95,
        'name'    => 'T-Shirt',
        'attributevalue' =>$this->input->post('attributevalue')
		);
		$this->cart->insert($data);
	

	}
	function removecart($rowid) 
	{

                    // Destroy selected rowid in session.
			if ($rowid==="all"){
                       // Destroy data which store in  session.
			$this->cart->destroy();
		}else{
                    // Destroy selected rowid in session.
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
                     // Update cart data, after cancle.
			$this->cart->update($data);
		}
		
                 // This will show cancle data in cart.
		redirect('cart');
		
	}
	
	function updatecart()
	{
         $data = array(
        'rowid' => $this->input->post('id'),
        'qty'   => $this->input->post('item')
	);
       $this->cart->update($data);
	}	
	 public function wishlist()
	{
	$uid=$this->session->userdata('uid');
	$postid=$this->input->post('id');
	$qty=$this->input->post('qty');
	$attributevalue=$this->input->post('attributevalue');
	$checkcart = $this->db->query('select * from wishlist 
		                            where productid="'.$postid.'" 
		                            and attributevalue="'.$attributevalue.'" and uid = "'.$uid.'"');
	$resultcheckcart = $checkcart->num_rows();


	if($resultcheckcart == '0' ){
	$data=array('productid'=>$postid,'uid'=>$uid,'item'=>$qty,'attributevalue'=>$attributevalue);
	$this->db->insert('wishlist',$data);
		echo '<script language="javascript">';
		echo 'alert("Successfully add to cart")';
		echo '</script>';
	}
	else{
		$this->db->delete('wishlist', array('productid'=>$postid,
										  'uid'=>$uid,'attributevalue'=>$attributevalue));
		echo '<script language="javascript">';
		echo 'alert("Already add to cart")';
		echo '</script>';
		}

	}
		
}