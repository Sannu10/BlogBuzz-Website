<?php
session_start();
include("connection.php");
    	if(isset($_POST['em']))
    	{

    		$email=$_POST['email'];
    		$msg=$_POST['message'];

    		global $eid;
    		
    		
    		//echo "<script>alert('Your Mail is Sent Succesfully !')</script>";
    		if(strlen($msg)>=1 and strlen($email)>=1)
    		{
    		$sq="insert into emails values('$email','$msg','$eid')";
    		$run=mysqli_query($con,$sq);
    		if($run){
				echo "<script>alert('Your Mail is Sent Succesfully !')</script>";
					}
                    header('location:index.php');
			}	
    		
    	}


    	?>
