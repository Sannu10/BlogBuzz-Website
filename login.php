<?php
session_start();
include("connection.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
    <title>LogIn</title>
    <link rel="stylesheet" type="text/css" href="./style3.css ">
    <style type="text/css">
      .pad{
        margin: 5vw;
        margin-left: 10vw;
        margin-right: 10vw;
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
        <!-- <a href="#">
          <i class="fa fa-user"></i>
          Dashboard
          <i class="fa fa-chevron-down" style="font-size: .8em;"></i>
        </a> -->
        <ul>
          <li><a href="login.php"></a></li>
          <!-- <li><a href="logout.php" class="Logout">Logout</a></li> -->
        </ul>
      </li>
    </ul>
  </header>
   
    <form action="" method="POST">
    <div class="pad">
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter UserName" name="email" required="required">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass" required="required">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Login</button>
</div>
</form>
<?php
  

  if(isset($_POST['submit']))
  {
    $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
    if($email=='admin' && $pass=="123")
    {
      $_SESSION['user_email']=$email;
      echo "<script>window.open('home.php','_self')</script>";
    }
    else{
      echo "<script>alert('Your UserName or password is incorrect')</script>";
    }
  }
?>
<?php include("footer.php"); ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!--slick  -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>     
<!-- custom script-->
<script src="js/script.js"></script>
  </body>
</html>