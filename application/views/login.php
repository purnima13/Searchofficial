<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
    	<div class="row">
    		<div class="col-lg-4 col-md-4 col-lg-oush-4 col-md-push-4">
    			<div class="panel panel-default" style="margin-top: 50px;">
    				<div class="panel-heading">Login</div>
    				<div class="panel-body">
    					<form method="post" action="<?php echo site_url();?>Ajaxsearch/index">
                         <div class="form-group">
                         	 <input type="text" class="form-control input-sm" name="email" placeholder="Username" required>
					     </div>
					     <div class="form-group">
                         	 <input type="password" class="form-control input-sm" name="password" placeholder="Password" required>
					     </div>
					     <div class="form-group">
                         	 <input type="submit" name="u_login" value="Login as Admin" class="btn btn-success btn-sm">
                         	 
					     </div>
    				</div>
    			</form>
    			</div>
    		</div>
    	</div>
    </div>
 <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
 
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
   