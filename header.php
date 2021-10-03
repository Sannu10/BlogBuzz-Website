<header>
		<div class="logo">
			<h1 class="logo-text"><span>Blog</span>Buzz</h1>
		</div>
		<i class="fa fa-bars menu-toggle"></i>
		<ul class="nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="#below">About</a></li>
			<li><a href="#below">Services</a></li>	
			<!-- <li><a href="#">signup</a></li>
			<li><a href="#">login</a></li> -->
			<li>
				<a href="#">
					<i class="fa fa-user"></i>
					Dashboard
					<i class="fa fa-chevron-down" style="font-size: .8em;"></i>
				</a>
				<ul>
					<li><a href="home.php ?>">Post</a></li>
					<?php 
					if(isset($_SESSION['user_email']))
						{
					echo'<li><a href="logout.php" class="Logout">Logout</a></li>';
						} 
						?>
		
				</ul>
			</li>
		</ul>
	</header>