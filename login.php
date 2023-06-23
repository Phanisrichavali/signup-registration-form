<?php
$login=0;
$invalid=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

$sql="Select * from `registration` where
 username='$username' and password='$password' ";
 $result=mysqli_query($con,$sql);
 if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
    $login=1;
    session_start();
    $_SESSION['username']=$username;
    header('location:home.php');

    }
    else{
$invalid=1;
 }
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login_page</title>
  </head>
  <body>
  <?php
    if($invalid){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oh no sorry!</strong>Invalid details...
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
     <?php
    if($login){
        echo '<div class="alert alert-success succes-dismissible fade show" role="alert">
        <strong>Success!</strong>You are SuccessfullyloggedIn
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <h1><center>Login  page</center></h1>
   
<div class="container mt-5">
<form action="login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">name</label>
    <input type="text" class="form-control" name="username"  placeholder="enter your name"> 
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password"  placeholder="enter your Password">
  </div>
  <button type="submit" class="btn btn-primary w-100 ">Login</button>
</form>
</div>
    </body>
</html>