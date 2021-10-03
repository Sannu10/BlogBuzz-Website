<?php
session_start();
include("connection.php");
$query="select * from posts order by post_id";
$run_query=mysqli_query($con,$query);
$iid=$_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- font awesome-->
	<script src="https://kit.fontawesome.com/c136af0b92.js" crossorigin="anonymous"></script>

	<!--google font-->
	<link href="https://fonts.googleapis.com/css?family=Candal|Lora&display=swap" rel="stylesheet">
	<!-- custom styling-->
	<link rel="stylesheet" type="text/css" href="style3.css ">
	<title>blog</title>
</head>
<body>

<?php
include("header.php");
?>
<div class="page-wrapper clearfix">

	
	<!--//post slider-->
	<!--content-->
	<div class="content clearfix">
		<!--main content-->
		<div class="main-content brief">
	
			
<?php
while($row_posts=mysqli_fetch_array($run_query))
{
	$tmpid=$row_posts['post_id'];
	$title=$row_posts['title'];
	$content=$row_posts['post_content'];
	$user=$row_posts['name'];
	$date=$row_posts['date'];
	$image=$row_posts['post_image'];
	if($iid==$tmpid)
	{

	echo "<h1 class='post-title'>$title</h1><div class='post-img'>
					<img src='$image' alt='''>					
				</div>
				<div class='post-info'> 
						<br>
						<i class='far fa-user'>$user</i>
						&nbsp;
						<i class='far fa-calendar'>$date</i>
					</div>
			<div class='post-content'><p>$content</p></div>
	";

	}
}

?>
</div>
<div class="sidebar brief">
				<div class="section search2">
					<br><br><br>
					<h2 class="section-title">Search</h2>
					<form action="search.php" method="get">
					<input type="text" name="search" class="text-input" placeholder="Search...">
					</form>
				</div>

				<div class="section topics">
					<h2 class="section-title">Topics</h2>
						<ul>
							<li><a href="sort.php?type=poem">Poems</a></li>
							<li><a href="sort.php?type=quotes">Quotes</a></li>
							<li><a href="sort.php?type=biography">Biography</a></li>
							<li><a href="sort.php?type=fiction">fiction</a></li>
							<li><a href="sort.php?type=thriller">Thriller</a></li>
							<?php
							$sql="select distinct type from posts order by post_id";
							$run_query=mysqli_query($con,$sql);
							while($row_post=mysqli_fetch_array($run_query))
							{
								$tt=$row_post['type'];
								if($tt!='poem' && $tt!='quotes' && $tt!='biography' && $tt!='fiction' && $tt!='thriller')
								{
									echo '<li><a href="sort.php?type='.$tt.'">'.$tt.'</a></li>';
								}

							}
							 ?>
						</ul>	
				</div>
			</div>
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