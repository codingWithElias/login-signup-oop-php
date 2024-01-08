<?php 
session_start();
include "Utils/Util.php";
if (isset($_SESSION['user_name']) &&
    isset($_SESSION['user_id'])) {

	include "Controller/User.php";
    $user->init($_SESSION['user_id']);
    $user_data = $user->getUser();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
	<link rel="stylesheet" 
	      type="text/css" 
	      href="Assets/css/style.css">
</head>
<body>
   <div class="wrapper">
    	<div class="form-holder">
    		<h2>Welcome <?=$user_data['full_name']?> !</h2>
    		<form class="form"
    		      action="logout.php" 
    		      method="GET">
    		    <h4>Email: <?=$user_data['user_email']?> !</h4>
    		    <h4>Username: <?=$user_data['user_name']?> !</h4>
    			<div class="form-group">
    				<button type="submit">Logout</button>
    			</div>
    		</form>
    	</div>
    </div>
</body>
</html>

<?php }else { 
$em = "First login ";
Util::redirect("login.php", "error", $em);
} ?>