<?php require_once("include/DB.php");  ?>
<?php require_once("include/Sessions.php");  ?>
<?php require_once("include/Functions.php");  ?>
<?php
if (isset($_POST["Submit"])) {
$Username=mysqli_real_escape_string($connectingDB,($_POST["Username"]));
$Password=mysqli_real_escape_string($connectingDB,($_POST["Password"]));
if(empty($Username) || empty($Password)){
$_SESSION["ErrorMessage"]="All Fields must be filled out";
redirect_to("Login.php");
}
else{
$Found_Account=Login_Attempt($Username,$Password);
$_SESSION["User_Id"]=$Found_Account["id"];
$_SESSION["Username"]=$Found_Account["username"];
if($Found_Account) {
$_SESSION["SuccessMessage"]="Welcome Successfull {$_SESSION["Username"]}";
redirect_to("AddNewPost.php");
}else{
 	$_SESSION["ErrorMessage"]="Invalid UserId";
redirect_to("Login.php");
}

}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Admins</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script href="js/bootstrap.min.js"></script>

	 <style>
	 	body{
	 		background-color: #ffffff; 
	 	}

	 </style>
</head>
<body>
	<div class="container" style="margin-top: 50px;">
	<div class="row">
	<div class="col-md-4 offset-md-4">
		<br><br><br><br><br>
		<?php echo Message();
			  echo SuccessMessage(); 
		?>
	<div class="col-md-12 col-md-offset-10">
	<form action="Login.php" method="post">
	<fieldset>
		<div class="form-group">	
		<label for="Username"><span class="FieldInfo">UserName:</span></label>
		<div class="input-group input-group-lg">
		<span class="input-group-addon">
		<span class="glyphicon glyphicon-envelope text-primary"></span>
		</span>	
		<input class="form-control" type="text" name="Username" id="UserName" placeholder="UserName">
		</div>
	</div>
		<div class="form-group">
		<label for="Password"><span class="FieldInfo">Password:</span></label>
		<div class="input-group input-group-lg">
		<span class="input-group-addon">
		<span class="glyphicon glyphicon-lock text-primary"></span>
		</span>	
		<input class="form-control" type="Password" name="Password" id="Password" placeholder="Password">
	</div>
</div>
	<br>
	<input class="btn btn-info btn-block" type="Submit" name="Submit" value="Login">
	</fieldset>
	<br>
</form>
</div>
</div>
</div>
</div>

</body>
</html>													