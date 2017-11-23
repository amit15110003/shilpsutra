
	<div class="col-md-3">
		<div class="" style="padding-right:10% !important;padding-top: 5%;padding-bottom: 10%;border-right:solid 1px #ccc;">
			<input class="range-example-input-2" type="text" min="0" max="5000" value="0,1000" name="points" step="100" id="price" style="padding-right:10% !important;" />
		        <script>
		            $(document).ready(function() {
		              $(".range-example-input-2").asRange({
		                range: true,
		                limit: false
		              });
		            });
		        </script>
			<label style="font-size: 1.6em;">Price</label>
		        <br><br>
		    <button class="theme-btn-lg col-md-12 col-xs-12" onclick="searchFilter()">Filter</button>
		</div>
	</div>

	<script>
         function searchFilter() {
             var keywords = $('#keywords').val();
             var sortBy = $('#sortBy').val();
             var price = $('#price').val();
             $.ajax({
                 type: 'POST',
                 url: '<?php echo base_url(); ?>index.php/product/viewsort/'+keywords,
                 data:'&keywords='+keywords+'&sortBy='+sortBy+'&price='+price,
                 beforeSend: function () {
                     $('.loading').show();
                 },
                 success: function (html) {
                     $('#postList').html(html);
                     $('.loading').fadeOut("slow");
                 }
             });
         }
      </script>
       function viewsort($category){
        $sortBy = $this->input->post('sortBy');
        $price = $this->input->post('price');
        $category = str_replace('%20', ' ', $category);
        $details['categoryval']=$category;
		$details['category']=$this->user->showcategory();
        if($sortBy=="high")
        {
		$details['query']=$this->user->sortproduct_high($category,$price);
		}
		else if($sortBy=="low")
		{
			$details['query']=$this->user->sortproduct_low($category,$price);
		}
		else if($sortBy=="popular")
		{
			$details['query']=$this->user->sortproduct_popular($category,$price);
		}
		else if($sortBy=="new")
		{
			$details['query']=$this->user->sortproduct_new($category,$price);
		}
		else
		{
			$details['query']=$this->user->sortproduct($category,$price);
		}
		$this->load->view('client/category1',$details);
    }

public function sortproduct_high($category,$price)
	{ 
		$this->db->order_by("cost", "desc");
		$this->db->where('category', $category);
		$new_str_arr = explode(',', $price);
		$price1= $new_str_arr[0];
		$price2= $new_str_arr[1];
		$this->db->where('cost >=',$price1);
		$this->db->where('cost <=',$price2);
		$this->db->where('status', "hosted");
		$query=$this->db->get('product');
		return $query->result();
	}