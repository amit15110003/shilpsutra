<?php 
$merchant_data='';
	$working_key='ED2B71ACB9F520BA54B3C73381291A53';//Shared by CCAVENUES
	$access_code='AVSH64DB03BF70HSFB';//Shared by CCAVENUES

	$production_url='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
?>
<div class="conatiner text-center" style="padding-top :100px;">
<iframe src="<?php echo $production_url?>" id="paymentFrame" width="482" height="450" frameborder="0" scrolling="No" ></iframe>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-1.7.2.js"></script>
<script type="text/javascript">
    	$(document).ready(function(){
    		 window.addEventListener('message', function(e) {
		    	 $("#paymentFrame").css("height",e.data['newHeight']+'px'); 	 
		 	 }, false);
	 	 	
		});
</script>
