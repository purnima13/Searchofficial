<!DOCTYPE html>
<html>
  <head>
    <title>Awesome Search Box</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<style type="text/css">
	
body,html{
    height: 100%;
    width: 100%;
    margin: 0;
    padding: 0;
    background: #e74c3c !important;
    }

    .searchbar{
    margin-bottom: 50%;
    //margin-top: 50%;
    height: 60px;
    background-color: #353b48;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 450px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: white;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:white;
    text-decoration:none;
    }

    #result{
    	margin-top: -50%;
    }
	
</style>
	  
  </head>
  <body>
    <div class="container h-100" style="margin-bottom=50%;">
      <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
          <input class="typeahead search_input" type="text" name="search_text" id="search_text" placeholder="Search the stock details here...">
          <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
        </div>
      </div>
	<div id="result" style="margin-bottom=40%;display: none;"></div>
	</div>
	<div style="clear:both"></div>
  </body>
</html>

<script>


var BASE_URL = "<?php echo base_url(); ?>";

$(document).ready(function(){

	load_data();

   $('#search_text').keyup(function() { 
 
   $( "#result" ).show(8000); 
 }); 


  $( "#search_text" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: BASE_URL + "ajaxsearch/search",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.SName;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });


	function load_data(query)
	{
		$.ajax({
			url:"<?php echo base_url(); ?>ajaxsearch/fetchdata",
			method:"POST",
			data:{query:query},
			success:function(data){
				$('#result').html(data);
			}
		})
	}

	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
	});
});
</script>
