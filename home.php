<?php
session_start();
include("connection.php");
if(!isset($_SESSION['user_email']))
{
	header ("location: login.php");
}

?>
<html>
<head>
	
	<title>DashBoard</title>
	<meta charset="utf-8">
 	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome-->
  <script src="https://kit.fontawesome.com/c136af0b92.js" crossorigin="anonymous"></script>

  <!--google font-->
  <link href="https://fonts.googleapis.com/css?family=Candal|Lora&display=swap" rel="stylesheet">
  <!-- custom styling-->
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <title>LogIn</title> -->
    <link rel="stylesheet" type="text/css" href="./style3.css ">
    <style type="text/css">
      .pad{
        margin: 5vw;
      }
    </style>
</head>
<body>
<header>
		<div class="logo">
			<h1 class="logo-text"><span>Blog</span>Buzz</h1>
		</div>
		<i class="fa fa-bars menu-toggle"></i>
		<ul class="nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="#below">About</a></li>
			<li><a href="#below">Services</a></li>	
			<!--<li><a href="#">signup</a></li>
			<li><a href="#">login</a></li>-->
			<li>
				<a href="#">
					<i class="fa fa-user"></i>
					DashBoard
					<i class="fa fa-chevron-down" style="font-size: .8em;"></i>
				</a>
				<ul>
					<!-- <li><a href="login.php">Login</a></li> -->
					<li><a href="logout.php" class="Logout">Logout</a></li>
				</ul>
			</li>
		</ul>
	</header>
<div class="pad">
<div class="row">
	<div id="insert_post" class="col-sm-12">
		<center>
		<form action="" method="post" id="f" enctype="multipart/form-data">
		<input type="text" class="form-control" name="title" id="title" placeholder="Enter title here"><br>
		<textarea class="form-control" id="content" rows="7" name="content" placeholder="What's in your mind?"></textarea><br>
		<input type="text" class="form-control" name="type" id="type" placeholder="Enter type of Post"><br>
		<input type="text" class="form-control" name="user" id="user" placeholder="Enter Username Here"><br><br><br>
		<label class="btn btn-warning" id="upload_image_button">Select Image
		<input type="file" name="upload_image" size="30" value="Select Image">
		</label><br>
		<button style="margin-top: 30px;padding-left: 50px;padding-right: 50px;" id="btn-post" class="btn btn-success" name="sub"> Post  </button>
		<?php
if(isset($_POST['sub']))
{
global $post_id;
$filename=$_FILES["upload_image"]["name"];
$tempname=$_FILES["upload_image"]["tmp_name"];
$folder="images/".$filename;
$content=$_POST['content'];
$title=$_POST['title'];
$user=$_POST['user'];
$type=$_POST['type'];
if(strlen($filename) >= 1 && strlen($content) >= 1){
move_uploaded_file($tempname, $folder);
$sql="insert into posts(post_id,post_content,post_image,title,name,type) values('$post_id','$content','$folder','$title','$user','$type')";
$run=mysqli_query($con,$sql);
if($run){
	$_SESSION['folder']=$folder;
	echo "<script>alert('Your Post updated a moment ago!')</script>";

	}
}
else{
	echo "<script>alert('Invalid Credential')</script>";
}

}

?>
		<button style="margin-top: 30px;padding-left: 50px;padding-right: 50px;" id="btn-post" class="btn btn-success" name="logout"> LogOut  </button>
		<?php
if(isset($_POST['logout']))
{
session_start();
session_destroy();
header("location:login.php");
}
?>

		</form>


		</center>
	</div>
</div>
</div>
<?php include("footer.php");?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!--slick  -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>			
<!-- custom script-->
<script src="js/script.js"></script>

</body>
</html>