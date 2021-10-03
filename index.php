<?php
session_start();
include("connection.php");
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
	<title>BlogBuzz</title>
</head>
<body>
	
	 <?php include("header.php"); ?>

	<!--page wrapper-->
	<div class="page-wrapper">
		<!--post slider-->
		<div class="post-slider">
			<h1 class="slider-title">Posts</h1>
			<i class="fas fa-chevron-left prev"></i>
			<i class="fas fa-chevron-right next"></i>
			<div class="post-wrapper">
	<?php
	$query="select * from posts order by post_id desc";
	$run_query=mysqli_query($con,$query);

	while($row_posts=mysqli_fetch_array($run_query))
	{
		$image=$row_posts['post_image'];
		$content=$row_posts['post_content'];
		$title=$row_posts['title'];
		$user=$row_posts['name'];
		$date=$row_posts['date'];
		$id=$row_posts['post_id'];
		$set=0;
		
			echo"	<div class='post'>
					<img id='posts-img=' src='$image' alt:'' class='slider-image'>
					<div class='post-info'> 

						<h4><a href='brief.php?id=$id'>$title</a></h4>
						<i class='far fa-user'>$user</i>
						&nbsp;
						<i class='far fa-calendar'>$date</i>
					</div>
				</div>";

			}
		?>
				
				
			</div>
		</div>	

	</div>
	<!--//post slider-->
	<!--content-->
	<div class="content clearfix">
		<!--main content-->
		<div class="main-content">
			<h1 class="recent-post-title">Recent posts</h1>
	<?php
	$query="select * from posts order by post_id desc limit 3";
	$run_query=mysqli_query($con,$query);
		
	while($row_post=mysqli_fetch_array($run_query))
	{
		$image1=$row_post['post_image'];
		$content1=$row_post['post_content'];
		$title1=$row_post['title'];
		$user1=$row_post['name'];
		$date1=$row_post['date'];
		$id1=$row_post['post_id'];
		$set1=0;

			echo"<div class='post clearfix'>
				<img id='posts-img=' src='$image1' alt='' class='post-image'>
				<div class='post-preview'>
					<h2><a href='brief.php?id=$id1'>$title1</a></h2>
					<i class='far fa-user'>$user1</i>
					&nbsp;
					<i class='far calendar'>$date1</i>
					<p class='preview-text'>
					$content1
					</p>
					<a href='brief.php?id=$id1' class='btn read-more'>Read more</a>
				</div>
			</div>";
	}

		?>


		</div>
 
<!--//main content-->
			<div class="sidebar">
				<div class="section search">
					<h2 class="section-title">Search</h2>
					<form action="search.php" method="get">
					<input type="text" name="search" class="text-input" placeholder="Search..."><br>
					</form>
				</div>
		

				<div class="section topics">
					<h2 class="section-title">Topics</h2>
						<ul>
							<li><a href="sort.php?type=poems">Poems</a></li>
							<li><a href="sort.php?type=quotes">Quotes</a></li>
							<li><a href="sort.php?type=biography">Biography</a></li>
							<li><a href="sort.php?type=places">Places</a></li>
							<li><a href="sort.php?type=food">FOOD</a></li>
							<?php
							$sql="select distinct type from posts order by post_id";
							$run_query=mysqli_query($con,$sql);
							while($row_post=mysqli_fetch_array($run_query))
							{
								$tt=$row_post['type'];
								if($tt!='poems' && $tt!='quotes' && $tt!='biography' && $tt!='places' && $tt!='food')
								{
									echo '<li><a href="sort.php?type='.$tt.'">'.$tt.'</a></li>';
								}

							}
							 ?>
						</ul>	
				</div>
			</div>

	</div>
	<?php include("footer.php"); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!--slick  -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>			
<!-- custom script-->
<script src="js/script.js"></script>


</body>
</html>