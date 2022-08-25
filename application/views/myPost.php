<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter infinite scroll pagination</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<style type="text/css">
  		.ajax-load{
  			background: #e1e1e1;
		    padding: 10px 0px;
		    width: 100%;
  		}
  	</style>
</head>
<body>


<div class="container">
	<h2 class="text-center">Codeigniter infinite scroll pagination</h2>
	<br/>
	<div class="col-md-12" id="post-data">
		<?php
		 // $this->load->view('data', $posts);
		?>

	</div>
</div>


<div class="ajax-load text-center" style="display:none">
	<p>
	Loading...</p>
</div>


<script type="text/javascript">
	var page = 7;
	var start =0;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        start=start+page;
	        loadMoreData(page);
	    }	
	});
	loadMoreData(page);

	function loadMoreData(page){
	  $.ajax({
	            url: '<?php echo base_url("home/loadData/");?>',
	            method: "get",
	            data:{page:page,start:start},
	            beforeSend: function()
	            {
	                $('.ajax-load').show();
	            },
		        success:function(data)
		        {
		        	console.log(data);
		            if(data == ""){
		                $('.ajax-load').html("No more records found");
		            }
		            $('.ajax-load').hide();
		            $("#post-data").append(data);
	       		 },
	        failure:function(data)
	        {
	              alert('server not responding...'+data);
	        }
	        });
	}
</script>


</body>
</html>