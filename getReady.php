<?php
$con=mysqli_connect("localhost","root","");
$sql="create database user";
$run=mysqli_query($con,$sql);
$sql="use user";
$run=mysqli_query($con,$sql);

$sql="create table emails (email varchar(35) NOT NULL,message varchar(400) NOT NULL,eid int(11) PRIMARY KEY AUTO_INCREMENT)";
$run=mysqli_query($con,$sql);
$sql="create table posts (post_id int(11) AUTO_INCREMENT PRIMARY KEY,post_content varchar(400) NOT NULL,post_image varchar(255)  NOT NULL,title varchar(100) NOT NULL,date timestamp DEFAULT CURRENT_TIMESTAMP,name varchar(20) NOT NULL,type varchar(20) NOT NULL)";
$run=mysqli_query($con,$sql);
?>