<?php
$hostname='localhost';
$username='root';
$password='';
$database='signup_form';
$con=mysqli_connect($hostname,$username,$password,$database);
if(!$con){
    die(mysqli_error($con));
}


?>