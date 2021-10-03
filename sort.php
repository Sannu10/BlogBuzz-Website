<?php
session_start();
include("connection.php");
$query="select * from posts order by post_id";
$run_query=mysqli_query($con,$query);
$typep=$_GET['type'];
$flag=0;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- font awesome-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
      
	<script src="https://kit.fontawesome.com/c136af0b92.js" crossorigin="anonymous"></script>

	<!--google font-->
	<link href="https://fonts.googleapis.com/css?family=Candal|Lora&display=swap" rel="stylesheet">
	<!-- custom styling-->
	<link rel="stylesheet" type="text/css" href="./style3.css">
	<title>blog</title>
</head>
<body>

<?php
include("header.php");
?>
<!-- <div class="page-wrapper">

	</div> -->
	<!--//post slider-->
	<!--content-->
	<div class='content clearfix'>
		<!--main content-->
		<div class='main-content2'>
		<?php	echo" <h1 class='recent-post-title'>Topic <i class='fas fa-chevron-right next'></i> $typep</h1><br>"?>
			
<?php
while($row_posts=mysqli_fetch_array($run_query))
{
	$tmpid=$row_posts['post_id'];
	$title=$row_posts['title'];
	$content=$row_posts['post_content'];
	$user=$row_posts['name'];
	$date=$row_posts['date'];
	$image=$row_posts['post_image'];
	$type=$row_posts['type'];

	if($type==$typep)
	{
	$flag=1;
	// Main Code Goes Here;
	echo "<div class='post clearfix'>
				<img src='$image' alt=' class='post-image' style='width:25vw'>
				<div class='post-preview'>
					<h2><a href='brief.php?id=$tmpid'>$title</a></h2>
					<i class='far fa-user'>$user</i>
					&nbsp;
					<i class='far calendar'> $date 2019</i>
					<p class='preview-text'>
					$content
					</p>
					<a href='brief.php?id=$tmpid' class='btn read-more'>Read more</a>
				</div>
			</div>";
	

	}
}

?>

<?php
if($flag==0){
echo "<h2 style='color:red'>Sorry, For This Topic No Post is There Till Now, We Will Add It Soon.......</h2><br><br><br>";}
?>
	</div>
</div>

<?php
include("footer.php");
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!--slick  -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>			
<!-- custom script-->
<script src="js/script.js"></script>

</body>
</html>
