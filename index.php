<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Responsive Image Slider</title>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/sliderstyle.css">

</head>

<body>
<!--Responsive Image slider starts-->

<!--cycle-slideshow-->
<div class="cycle-slideshow" data-cycle-slides=".slide" data-cycle-pause-on-hover="true" data-cycle-fx="scrollHorz" data-cycle-timeout="3000">
	<!--Slider Control Starts-->
	<span class="cycle-next"></span>
	<span class="cycle-prev"></span>
	<span class="cycle-pager"></span>
	<!--Slider Control Ends-->
	
<?php
$dis='';
require_once ('include/DB.php');
$ViewQuery="SELECT * FROM slider";
		$Execute=mysqli_query($connectingDB,$ViewQuery);
		while ($row=mysqli_fetch_array($Execute)) {
	
$sid=$row['id'];
$image=$row['banner'];
$head=$row['title'];
$para=$row['text'];
$link=$row['link'];
$linktext=$row['link_text'];


$dis.='<!--Slide-One-->
	<div class="slide">
	<img src="images/' . $image . '" alt="Banner by Andy">
	<!--Caption Start-->
	<div class="caption">
		<h3>' . $head . '</h3>
		<p>' . $para . '</p>
		<p><a href="http://' . $link . '">' . $linktext . '</a></p>
	</div>
	<!--Caption Ends-->
	</div>
	<!--Slide-One-End-->';
}
mysqli_free_result($Execute);

echo $dis; ?>
	
</div>
<!--cycle-slideshow-ends-->

<!--Responsive Image slider Ends-->
</body>

</html>