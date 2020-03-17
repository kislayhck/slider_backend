<?php require_once("include/DB.php");  ?>
<?php require_once("include/Sessions.php");  ?>
<?php require_once("include/Functions.php");  ?>
<?php
if (isset($_POST["Submit"])) {
$Image=$_FILES["Image"]["name"];
$Target="Upload/".basename($_FILES["Image"]["name"]);
	global $connectingDB;
	$Query="INSERT INTO admin_panel(image) VALUES ('$Image')";
	$Execute=mysqli_query($connectingDB,$Query);
	move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
if($Execute){
		$_SESSION["SuccessMessage"]="Post Added Successfully";
	redirect_to('AddNewPost.php');	
	}else{
		$_SESSION["ErrorMessage"]="Not Added Successfully";
	redirect_to('AddNewPost.php');
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkig</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script href="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid" style="background-color:black;">
	<div class="row">
			
			<div class="col-sm-2" style="background-color:#262626;color:#fff;">
				<h1>Add New Post</h1>
			
			<?php require_once("include/sidebar.php");  ?>
			
			</div><!-- Ending of sidebar -->
	<div class="col-sm-10" style="background-color: #FFFFFF;">
		<h1>Add New Post</h1>

		<?php echo Message();
			  echo SuccessMessage(); 
		?>
<div>
		<form action="AddNewPost.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
		<label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
		<input type="File" class="form-control" name="Image" id="imageselect">
		</div>
		<input class="btn btn-success btn-block" type="Submit" name="Submit" value="Add new Category">
	</form>
</div>
	
	</div><!-- Ending of main area -->
</div>
</div>	

</body>
</html>													