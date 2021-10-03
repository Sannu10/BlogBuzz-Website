<?php
include("connection.php");
$query="select * from posts order by post_id";
$run_query=mysqli_query($con,$query);
while($row_posts=mysqli_fetch_array($run_query))
{
	$image=$row_posts['post_image'];
	$content=$row_posts['post_content'];

	echo"
			<div class='row'>
				<div class='col-sm-3'>
				</div>
				<div id='posts' class='col-sm-6'>
					<div class='row'>
						<div class='col-sm-12'>
							<p>$content</p>
							<a href='$image'><img id='posts-img=' src='$image' style='height:350px;'></a>
						</div>
					</div><br>
				</div>
			</div><br><br>
			";
}

?>