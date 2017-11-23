<?php
class payment extends CI_Controller
{
    	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url', 'html','text','typography','date','crypto_helper'));
		$this->load->library(array('session', 'form_validation','pagination','cart','facebook','google'));
		$this->load->database();
		$this->load->model('user');
	}
	
	public function index()
	{
	    $data['query']=$this->user->showcart($this->session->userdata('uid'));
	    $oid=$this->user->order_max();
	    $i=0;
            if(!empty($cart =$this->cart->contents()))
                { foreach ($cart as $item )
                    {
                        $details=$this->user->get_product_by_id($item['id']);
                            $details1=$this->user->attributevalue_cost($item['attributevalue']);
                            $i=$i+($details1[0]->cost*$item['qty']);
                        }
                    }
            elseif(!empty($this->session->userdata('uid'))){
            foreach ($query as $row ) 
            {
            $details=$this->user->get_product_by_id($row->productid);
            $details1=$this->user->attributevalue_cost($row->attributevalue);
            $i=$i+($details1[0]->cost*$row->item);}
            }
        	$merchant_data='';
	        $working_key='ED2B71ACB9F520BA54B3C73381291A53';
	        $access_code='AVSH64DB03BF70HSFB';
	    $data = array(
				'tid'=> $this->input->post('tid'),
				'merchant_id' =>'90818',
				'order_id' => $oid,
				'amount'=>'1.00',
				'currency'=> 'INR',
				'redirect_url' =>'http://thehippogriff.com/hippo/index.php/payment/status',
				'cancel_url' =>'http://thehippogriff.com/hippo/index.php/payment/status',
				'language' =>'EN',
				'billing_name' => $this->input->post('billing_name'),
				'billing_address' => $this->input->post('billing_address'),
				'billing_city' => $this->input->post('billing_city'),
				'billing_state' =>  $this->input->post('billing_state'),
				'billing_zip' => $this->input->post('billing_zip'),
				'billing_country' => 'India',
				'billing_tel' =>  $this->input->post('billing_tel'),
				'billing_email' =>  $this->input->post('billing_email'),
				'delivery_name' => $this->input->post('delivery_name'),
				'delivery_address' => $this->input->post('delivery_address'),
				'delivery_city' => $this->input->post('delivery_city'),
				'delivery_state' =>  $this->input->post('delivery_state'),
				'delivery_zip' => $this->input->post('delivery_zip'),
				'delivery_country' => 'India',
				'delivery_tel' =>  $this->input->post('delivery_tel'),
				'merchant_param1'=>'additional Info.',
				'merchant_param2'=>'additional Info.',
				'merchant_param3'=>'additional Info.',
				'merchant_param4'=>'additional Info.',
				'merchant_param5'=>'additional Info.',
				'promo_code' =>  $this->input->post('promo_code'),
				'customer_identifier'=>'1',
				'integration_type'=>'iframe_normal');
				
	       foreach ($data as $key=>$value)
	       {
		        $merchant_data.=$key.'='.$value.'&';
	        }
		$encrypted_data=encrypt1($merchant_data,$working_key);
	$data1['encrypted_data']=$encrypted_data;
	$this->load->view('client/header');
	$this->load->view('client/ccavRequestHandler',$data1);
	$this->load->view('client/footer');
	}
	public function status()
            {
                        $workingKey='ED2B71ACB9F520BA54B3C73381291A53';		
	                    $encResponse=$_POST["encResp"];		
	                    $rcvdString=decrypt1($encResponse,$workingKey);
	                    $order_status="";
	                    $decryptValues=explode('&', $rcvdString);
	                    $dataSize=sizeof($decryptValues);
	                    for($i = 0; $i < $dataSize; $i++) 
                    	{
                    		$information=explode('=',$decryptValues[$i]);
                    		if($i==0)	$orderid=$information[1];
                    		if($i==1)	$txnid=$information[1];
                    		if($i==3)	$status=$information[1];
                    		if($i==5)	$payment_mode=$information[1];
                    		if($i==10)	$amount=$information[1];
                    		if($i==11)	$billing_name=$information[1];
                    		if($i==12)	$billing_address=$information[1];
                    		if($i==13)	$billing_city=$information[1];
                    		if($i==14)	$billing_state=$information[1];
                    		if($i==15)	$billing_zip=$information[1];
                    		if($i==17)	$billing_tel=$information[1];
                    		if($i==18)	$billing_email=$information[1];
                    		if($i==19)	$delivery_name=$information[1];
                    		if($i==20)	$delivery_address=$information[1];
                    		if($i==21)	$delivery_city=$information[1];
                    		if($i==22)	$delivery_state=$information[1];
                    		if($i==23)	$delivery_zip=$information[1];
                    		if($i==25)	$delivery_tel=$information[1];
                    	}
                    	$data1=array(
                    	    'order_id' => $orderid,
				            'amount'=>$amount,
				            'payment_mode'=>$payment_mode,
                    	    'billing_name' => $billing_name,
				            'billing_address' => $billing_address,
				            'billing_city' => $billing_city,
				            'billing_state' =>  $billing_state,
				            'billing_zip' => $billing_zip,
				            'billing_tel' =>$billing_tel,
				            'billing_email' => $billing_email,
				            'delivery_name' =>$delivery_name,
				            'delivery_address' => $delivery_address,
            				'delivery_city' => $delivery_city,
            				'delivery_state' =>  $delivery_state,
            				'delivery_zip' => $delivery_zip,
				            'delivery_tel' =>  $delivery_tel,
				            'status' =>  $status
                    	    );
                    	    
                        $result1=$this->user->orderdetails($data1);
                    	$data['orderid']=$orderid;
                    	$data['status']=$status;	
                    	$data['txnid']=$txnid;
                    	if($status=="Success")
                        {
                                if(!empty($id=$this->session->userdata('uid')))
                                {
                                $result=$this->user->orderupdate($id,$txnid,$status,$orderid);
                                }
                                else
                                {
                                    if ($cart = $this->cart->contents())
                        				{
                        					foreach ($cart as $item)
                        					{
                        						$postid=$item['id'];
                        						$qty=$item['qty'];
                        						$attributevalue=$item['attributevalue'];
                        						$dpo= date("Y-m-d H:i:s");
                        						$data=array('productid'=>$postid,'uid'=>'10000','item'=>$qty,'attributevalue'=>$attributevalue,'txnid'=>$txnid,'status'=>$status,'dpo'=>$dpo,'orderid'=>$orderid);
						                        $this->db->insert('itemorder',$data);
                        			    	}
                        			    	
                        			    }
                        			 $this->cart->destroy();
                                }
                        
                        $this->load->view('client/header');
                        $this->load->view('client/success',$data);
                        $this->load->view('client/footer');
                        }
                        elseif($status=="Failure")
                        {
                             if(!empty($id=$this->session->userdata('uid')))
                                {
                                $result=$this->user->orderupdate1($id,$txnid,$status,$orderid);
                                }
                                else
                                {
                                    if ($cart = $this->cart->contents())
                        				{
                        					foreach ($cart as $item)
                        					{
                        						$postid=$item['id'];
                        						$qty=$item['qty'];
                        						$attributevalue=$item['attributevalue'];
                        						$dpo= date("Y-m-d H:i:s");
                        						$data=array('productid'=>$postid,'uid'=>'10000','item'=>$qty,'attributevalue'=>$attributevalue,'txnid'=>$txnid,'status'=>$status,'dpo'=>$dpo,'orderid'=>$orderid);
						                        $this->db->insert('itemorder',$data);
                        			    	}
                        			    	
                        			    }
                                }
                        
                        $this->load->view('client/header');
                        $this->load->view('client/success',$data);
                        $this->load->view('client/footer');   
                        }
                        else
                        {
                            $this->load->view('client/header');
                        $this->load->view('client/success',$data);
                        $this->load->view('client/footer');  
                        }
            }
        
	
		
}