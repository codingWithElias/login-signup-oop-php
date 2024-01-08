<?php 
include "Utils/Validation.php";

$fname = $uname = $email ="";
if (isset($_GET["fname"])) {
	$fname = $_GET["fname"];
}
if (isset($_GET["uname"])) {
	$uname = $_GET["uname"];
}
if (isset($_GET["email"])) {
	$email = $_GET["email"];
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="stylesheet" 
	      type="text/css" 
	      href="Assets/css/style.css">
</head>
<body>
    <div class="wrapper">
    	<div class="form-holder">
    		<h2>Create New Account</h2>
    		<?php 
                if (isset($_GET['error'])) { ?>
                	<p class="error"><?=Validation::clean($_GET['error'])?></p>
            <?php } ?>
            <?php 
                if (isset($_GET['success'])) { ?>
                	<p class="success"><?=Validation::clean($_GET['success'])?></p>
            <?php } ?>
    		
    		<form class="form"
    		      action="Action/signup.php" 
    		      method="POST">
    			<div class="form-group">
    				<input type="text" 
    				       name="fullname"
    				       placeholder="Full name"
    				       value="<?=$fname?>">
    			</div>
    			<div class="form-group">
    				<input type="text" 
    				       name="username"
    				       placeholder="User name"
    				       value="<?=$uname?>">
    			</div>
    			<div class="form-group">
    				<input type="text" 
    				       name="email"
    				       placeholder="Email"
    				       value="<?=$email?>">
    			</div>
    			<div class="form-group">
    				<input type="password" 
    				       name="password"
    				       placeholder="Password">
    			</div>
    			<div class="form-group">
    				<input type="password" 
    				       name="re_password"
    				       placeholder="Confirm Password">
    			</div>
    			<div class="form-group">
    				<button type="submit">Sign Up</button>
    			</div>
    			<div class="form-group">
    				<a href="login.php">Sign In</a>
    			</div>
    		</form>
    	</div>
    </div>
</body>
</html>