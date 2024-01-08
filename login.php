<?php
include "Utils/Validation.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" 
	      type="text/css" 
	      href="Assets/css/style.css">
</head>
<body>
    <div class="wrapper">
    	<div class="form-holder">
    		<h2>SIGN IN</h2>
    		<?php 
                if (isset($_GET['error'])) { ?>
                	<p class="error"><?=Validation::clean($_GET['error'])?></p>
            <?php } ?>
    		
    		<form class="form"
    		      action="Action/login.php" 
    		      method="POST">
    			<div class="form-group">
    				<input type="text" 
    				       name="username"
    				       placeholder="User name">
    			</div>
    			<div class="form-group">
    				<input type="password" 
    				       name="password"
    				       placeholder="Password">
    			</div>
    			<div class="form-group">
    				<button type="submit">Login</button>
    			</div>
    			<div class="form-group">
    				<a href="signup.php">Sign Up</a>
    			</div>
    		</form>
    	</div>
    </div>
</body>
</html>